<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request as Requestvalidate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

// use Illuminate\Http\Request;
use App\Models\pages;
use App\Models\page_section;
use App\Models\page_content;
use App\Models\contactinfo;
use App\Models\websetting;
use App\Models\leads;
use App\Models\emailtemplate;
use App\Models\email_attachment;
use App\Models\emailinfo;
use App\Models\stores;
use App\Models\gallery;
use Carbon\Carbon;

use Request;
use Config;
use Mail;

class UserController extends Controller
{
    public function index($url = '', $id = 0)
    {
        $page = pages::where(['url' => $url, 'type' => 0])->first();
        if ($page != '') {
            if ($page->url == 'index') {
                return $this->home();
            } elseif ($page->url == 'contact-us') {
                return $this->contactus($url);
            } elseif ($page->url == 'about-us') {
                return $this->aboutus($url);
            } elseif ($page->url == 'privacy-policy') {
                return $this->privacypolicy($url);
            } elseif ($page->url == 'terms-conditions') {
                return $this->termsconditions($url);
            } elseif ($page->url == 'disclaimer') {
                return $this->disclaimer($url);
            } elseif ($page->url == 'online-store') {
                return $this->onlineStore($url);
            }
            return $this->page($url);
        }

        if ($url == 'sendmessage') {
            $data = Request::all();
            return $this->sendmessage($data);
        } elseif ($url == 'sendmail') {
            $data = Request::all();
            return $this->sendmail($data);
        } elseif ($url == '') {
            return $this->home();
        } else {
            return $this->pagenotfound();
        }
    }
    public function pagenotfound()
    {
        return view('errors.404');
    }
    public function getmeta($url)
    {
        $data = pages::where('url', $url)->first();
        if (isset($data)) {
            return $data;
        }
    }
    public function getpage($url, $type)
    {
        $data = pages::with([
            'page_section' => function ($query) {
                $query->orderBy('sequence')->with([
                    'page_content' => function ($query) {
                        $query->orderBy('sequence');
                    }
                ]);
            }
        ])->where(['url' => $url, 'type' => $type])->first();

        // Check if the data exists and return it
        if ($data) {
            return $data;
        } else {
            return 0;
        }
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
    public function sendmail($data)
    {
        $this->emailsend($data['email'], $data['title'], $data['msg'], isset($data['attachment']) ? $data['attachment'] : []);
    }
    public function emailsend($sendemail, $title, $msg, $attachment = '')
    {
        $websetting = websetting::first();
        $config = array(
            'driver' => 'smtp',
            'host' => $websetting->smtp_host,
            'port' => $websetting->smtp_port,
            'from' => array('address' => $websetting->from, 'name' => '${APP_NAME}'),
            'encryption' => $websetting->smtp_crypto,
            'username' => $websetting->smtp_user,
            'password' => $websetting->smtp_password,
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        );
        Config::set('mail', $config);
        $msgre = $msg;

        Mail::html($msgre, function ($message) use ($sendemail, $title, $attachment, $websetting) {
            $message->from('jilsutariyapatel10179@gmail.com');
            $message->to($sendemail)->subject($title);
            $message->from($websetting->from);
            if ($attachment != '') {
                foreach ($attachment as $file) {
                    $message->attach($file);
                }
            }
        });
        return redirect()->back();
    }
    private function isValidTimezone(string $tz): bool
    {
        \Log::info('tz'. $tz);
        try { new \DateTimeZone($tz); return true; }
        catch (\Exception $e) { return false; }
    }
    public function sendmessage($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'mobile' => 'required',
        ]);

        // If validation fails, return the errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $timezone = $data['timezone'] ?? 'UTC';
        if (!$this->isValidTimezone($timezone)) $timezone = 'UTC';
        // Set runtime timezone
        config(['app.timezone' => $timezone]);
        date_default_timezone_set($timezone);

        $flag = 0;
        if (isset($data['flag']) && $data['flag'] != '') {
            $flag = 1;
        } else {
            $flag = 0;
        }
        if (isset($data) && $flag == 0) {
            $insert = array(
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'message' => isset($data['message']) ? $data['message'] : '',
                'subject' => (isset($data['subject']) ? $data['subject'] : ''),
                'page_id' => isset($data['page_id']) ? $data['page_id'] : '',
                'status' => 0,
                'source' => 1,
                'date' => Carbon::now()->format('d-m-Y'),
            );
            leads::create($insert);

            $websetting = websetting::first();
            $msg = "
                <h1>New Inquiry from Website</h1>
                <p>You have received a new inquiry. Below are the details:</p>
                <ul>
                    <li><strong>Name:</strong> " . $data['name'] . "</li>
                    <li><strong>Email:</strong> " . $data['email'] . "</li>
                    <li><strong>Mobile:</strong> " . $data['mobile'] . "</li>
                    <li><strong>Subject:</strong> " . (isset($data['subject']) ? $data['subject'] : '-') . "</li>
                    <li><strong>Message:</strong> " . (isset($data['message']) ? nl2br($data['message']) : '-') . "</li>
                </ul>
                <p>This inquiry was submitted on <strong>" . Carbon::now()->format('d-m-Y') . "</strong>.</p>
                <p>Please respond to this inquiry at your earliest convenience.</p>";

            // send mail -> admin
            if (isset($websetting->receive_inquiry_email) && !empty($websetting->receive_inquiry_email) && !empty($websetting->smtp_host) && !empty($websetting->smtp_port) && !empty($websetting->smtp_user) && !empty($websetting->smtp_password) && !empty($websetting->from)) {
                $this->emailsend($websetting->receive_inquiry_email, 'New Inquiry from Website', $msg);
            }

            // send mail -> user
            $sendmaildata = [];
            // if ($data['email'] != '' && !empty($websetting->smtp_host) && !empty($websetting->smtp_port) && !empty($websetting->smtp_user) && !empty($websetting->smtp_password) && !empty($websetting->from)) {
            //     $email = emailtemplate::where('id', 1)->first();
            //     if ($email != '') { 
            //         $attach = email_attachment::where('e_id', $email->e_id)->get();
            //         $attachment = array();
            //         foreach ($attach as $v) {
            //             $attachmentPath = public_path('Assets/Admin/images/emailattachment/' . $v->url);
            //             if (file_exists($attachmentPath)) {
            //                 array_push($attachment, $attachmentPath);
            //             }
            //         }
            //         $msg = $email->template;
            //         $msg = str_replace("{:name:}", $data['name'], $msg);
            //         $sendmaildata = array(
            //             'title' => $email->title,
            //             'msg' => $msg,
            //             'attachment' => $attachment,
            //             'email' => $data['email'],
            //         );
            //     }
            // }

            $response = array(
                'success' => true,
                'sendmaildata' => $sendmaildata,
                'message' => 'Your message has been sent. Thank You!',
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Something went wrong. Try again...!',
            );
        }
        return response()->json($response);
    }

    public function home()
    {
        $data['page'] = $this->getpage('index', 0);
        $data['meta'] = $this->getmeta('index');
        $data['websetting'] = websetting::find(1);
        $data['emailinfo'] = emailinfo::all();
        $data['contactinfo'] = contactinfo::all();
        $data['gallery'] = gallery::orderBy('id', 'DESC')->get();
        $data['stores'] = stores::where('store_type', 'physical')
                                ->where('is_active', 1)->get();
        return view('home', $data);
    }
    public function onlineStore($url)
    {
        $data['page'] = $this->getpage($url, 0);
        $data['stores'] = stores::where('store_type', 'online')
                        ->where('is_active', true)
                        ->get();
        $data['websetting'] = websetting::find(1);
        $data['emailinfo'] = emailinfo::all();
        $data['contactinfo'] = contactinfo::all();

        return view('onlinestore', $data);
    }
    public function aboutus($url)
    {
        $data['page'] = $this->getpage($url, 0);
        $data['meta'] = $this->getmeta($url);
        return view('aboutus', $data);
    }
    public function contactus($url)
    {
        $data['page'] = $this->getpage($url, 0);
        $data['meta'] = $this->getmeta($url);
        $data['websetting'] = websetting::find(1);
        $data['emailinfo'] = emailinfo::all();
        $data['contactinfo'] = contactinfo::all();
        return view('contactus', $data);
    }
    public function privacypolicy($url)
    {
        $data['page'] = $this->getpage($url, 0);
        $data['meta'] = $this->getmeta($url);
        return view('privacypolicy', $data);
    }
    public function termsconditions($url)
    {
        $data['page'] = $this->getpage($url, 0);
        $data['meta'] = $this->getmeta($url);
        return view('termsconditions', $data);
    }
    public function disclaimer($url)
    {
        $data['page'] = $this->getpage($url, 0);
        $data['meta'] = $this->getmeta($url);
        return view('disclaimer', $data);
    }
}

