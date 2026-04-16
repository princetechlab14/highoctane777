<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\websetting;
use App\Models\emailtemplate;
use App\Models\email_attachment;
use App\Models\staff_sessions;
use Carbon\Carbon;
use Session;
use DB;
use Mail;

class AuthController extends Controller
{
    private function isValidTimezone(string $tz): bool
    {
        try { new \DateTimeZone($tz); return true; }
        catch (\Exception $e) { return false; }
    }

    public function flashmessage($msg, $status = 1)
    {
        $toastr = '';
        if ($status == 0) {
            $toastr = "toastr.success('$msg');";
        } else {
            $toastr = "toastr.error('$msg');";
        }
        Session::flash('message', $toastr);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function logincheck(Request $request)
    {
        $data = $request->all();
        if (isset($data) && !empty($data['email']) && !empty($data['password'])) {
            $user = users::where([['username', $data['email']], ['password', md5($data['password'])]])
                ->orwhere([['email', $data['email']], ['password', md5($data['password'])]])->first();
            if (isset($user)) {
                $activeSession = DB::table('staff_sessions')->where('user_id', $user->id)->whereNull('logout_at')->first();
                if ($activeSession) {
                    return response()->json([
                        'success' => false,
                        'message' => 'User already logged in on another device'
                    ]);
                }

                session()->put('admin', $user);

                $timezone = $request->input('timezone', config('app.timezone'));
                if ($this->isValidTimezone($timezone)) {
                    session()->put('admin_timezone', $timezone);
                }
    
                date_default_timezone_set(session('admin_timezone'));
                Config::set('app.timezone', session('admin_timezone'));

                if ($user->user_type == 'staff') {
                    staff_sessions::create([
                        'user_id'   => $user->id,
                        'store_id' => $user->store_id,
                        'login_at'  => Carbon::now(),
                        'date' => Carbon::now(),
                        'timezone' => session('admin_timezone'),
                    ]);
                }

                $response = array(
                    'success' => true,
                    'redirect_url' => url('/admin/dashboard'),
                );
                $toastr = "toastr.success('Login Successfully..!');";
                Session::flash('message', $toastr);
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Invalid Username and Password..!',
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'User something Went Wrong..!',
            );
        }
        return response()->json($response);
    }

    public function logout()
    {
        $user = session('admin');
        if ($user && $user->user_type == 'staff') {
            $timezone = session('admin_timezone', config('app.timezone'));

            if ($this->isValidTimezone($timezone)) {
                date_default_timezone_set($timezone);
                Config::set('app.timezone', $timezone);
            }
            
            $session = DB::table('staff_sessions')
                ->where('user_id', $user->id)
                ->whereNull('logout_at')
                ->orderBy('id', 'desc')
                ->first();

            if ($session) {
                DB::table('staff_sessions')
                    ->where('id', $session->id)
                    ->update([
                        'logout_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
            }
        }

        session()->pull('admin');
        session()->forget('admin_timezone');
        return redirect('/admin/login');
    }

    public function forgotpassword(Request $request, $token = 0)
    {
        $data = $request->input();
        if (count($data) > 0 && $token == 0) {
            $email = $data['email'];
            $user = users::where('email', $data['email'])->first();
            if ($user != '') {
                $websetting = websetting::first();
                $data['token'] = rand(111111, 999999);
                users::where('email', $data['email'])->update(array('ftoken' => $data['token']));
                $template = emailtemplate::where('id', 2)->first();
                $attach = email_attachment::where('e_id', 2)->get();
                $attachment = array();
                foreach ($attach as $v) {
                    $attachment[] = public_path('/Assets/Admin/EmailAttachments/' . $v->file);
                }
                $subject = str_replace(array('{website_name}',), array($websetting->website_name,), $template->subject);
                $message = str_replace(array('{website_name}', '{token}'), array($websetting->website_name, $data['token']), $template->message);
                $data = array('email' => $email, 'subject' => $subject, 'message' => $message, 'attachment' => $attachment);
                Mail::send([], [], function ($m) use ($data) {
                    $m->to($data['email'])->subject($data['subject']);
                    $m->setBody($data['message'], 'text/html');
                    if (!empty($data['attachment'])) {
                        foreach ($data['attachment'] as $filePath) {
                            $m->attach($filePath);
                        }
                    }
                });
                echo json_encode(['success' => true, 'message' => 'Check your email..!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Email id not found..!']);
            }
        } elseif ($token != 0) {
            $result = users::where('ftoken', $token)->first();
            if (!empty($result)) {
                return view('admin.resetpassword', ['token' => $token]);
            } else {
                return redirect('admin/login');
            }
        } else {
            return view('admin.forgotpassword');
        }
    }

    public function changepassword(Request $request)
    {
        $data = $request->all();
        if (isset($data) && !empty($data)) {
            $user = session('admin');
            $checkuser = users::where([['id', $user->id], ['password', md5($data['oldpassword'])]])->first();
            if (isset($checkuser)) {
                users::where('id', $user->id)->update(array('password' => md5($data['password'])));
                session()->pull('admin');
                $response = array(
                    'success' => true,
                    'message' => 'Password Changed Successfully..!',
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Old Password Does not match..!',
                );
            }
            return response()->json($response);
        }
        return view('admin.changepassword');
    }

    public function profile(Request $request)
    {
        $id = session()->get('admin.id');
        if (!$id) {
            return redirect('/admin/login');
        }

        $data = $request->all();
        if (!empty($data)) {
            $update = [];
            if ($request->hasFile('profile_pic')) {
                $image = $request->file('profile_pic');
                $filename = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/Assets/Admin/images/profile/'), $filename);
                $update['profile_pic'] = $filename;
            }
            $update['name'] = $data['name'];
            $update['email'] = $data['email'];
            $update['phone'] = $data['phone'] ?? '';
            $update['address'] = $data['address'] ?? '';

            if (!empty($data['password'])) {
                $update['password'] = md5($data['password']);
            }

            users::where('id', $id)->update($update);
            $user = users::where('id', $id)->first();
            session()->put('admin', $user);
            $this->flashmessage('Profile Updated Successfully', 0);
            return redirect()->back();
        }

        $data['user'] = users::where('id', $id)->first();
        return view('admin.profile', $data);
    }
}
