<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leads;
use App\Models\leadfollow;
use App\Models\emailtemplate;
use App\Models\email_attachment;
use App\Models\websetting;
use Carbon\Carbon;
use Session;
use DB;
use Mail;

class LeadController extends Controller
{
    private function checkPermission($feature, $action)
    {
        if (!hasPermission($feature, $action)) {
            $this->flashmessage('You do not have permission to perform this action.', 1);
            return redirect('/admin/dashboard');
        }
        return true;
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

    private function emailsend($to, $subject, $message, $attachment = [])
    {
        $websetting = websetting::first();
        $data = array('email' => $to, 'subject' => $subject, 'message' => $message, 'attachment' => $attachment);
        Mail::send([], [], function ($m) use ($data, $websetting) {
            $m->to($data['email'])->subject($data['subject']);
            $m->setBody($data['message'], 'text/html');
            $m->from($websetting->from, $websetting->website_name);
            if (!empty($data['attachment'])) {
                foreach ($data['attachment'] as $filePath) {
                    $m->attach($filePath);
                }
            }
        });
    }

    public function index(Request $request)
    {
        if (($check = $this->checkPermission('leads', 'can_view')) !== true) {
            return $check;
        }
        $emailtemplate = emailtemplate::where('is_delete', 0)->get();
        return view('admin.leads', ['id' => 0, 'emailtemplate' => $emailtemplate]);
    }

    public function create()
    {
        if (($check = $this->checkPermission('leads', 'can_create')) !== true) {
            return $check;
        }
        $emailtemplate = emailtemplate::where('is_delete', 0)->get();
        return view('admin.leads', ['id' => 0, 'emailtemplate' => $emailtemplate]);
    }

    public function store(Request $request)
    {
        if (($check = $this->checkPermission('leads', 'can_create')) !== true) {
            return $check;
        }

        $data = $request->input();
        $tz = session('admin_timezone', config('app.timezone'));
        $ins = [
            'name' => $data['name'],
            'country_code' => $data['country_code'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'date' => isset($data['date']) ? Carbon::parse($data['date'], $tz) : Carbon::now($tz),
            'source' => 0,
            'subject' => $data['subject'] ?? '',
            'message' => $data['message'] ?? '',
            'status' => 0,
        ];
        
        leads::create($ins);
        $this->flashmessage('Lead Inserted Successfully', 0);
        return redirect()->back();
    }

    public function show($id)
    {
        if (($check = $this->checkPermission('leads', 'can_view')) !== true) {
            return $check;
        }
        $lead = leads::find($id);
        return response()->json($lead);
    }

    public function edit($id)
    {
        if (($check = $this->checkPermission('leads', 'can_edit')) !== true) {
            return $check;
        }
        $lead = leads::find($id);
        $emailtemplate = emailtemplate::where('is_delete', 0)->get();
        return view('admin.leads', ['lead' => $lead, 'id' => $id, 'emailtemplate' => $emailtemplate]);
    }

    public function update(Request $request, $id)
    {
        if (($check = $this->checkPermission('leads', 'can_edit')) !== true) {
            return $check;
        }

        $data = $request->input();
        $tz = session('admin_timezone', config('app.timezone'));
        $ins = [
            'name' => $data['name'],
            'country_code' => $data['country_code'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'date' => isset($data['date']) ? Carbon::parse($data['date'], $tz) : Carbon::now($tz),
            'source' => 0,
            'subject' => $data['subject'] ?? '',
            'message' => $data['message'] ?? '',
        ];
        
        leads::where('id', $id)->update($ins);
        $this->flashmessage('Lead Updated Successfully', 0);
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (($check = $this->checkPermission('leads', 'can_delete')) !== true) {
            return $check;
        }
        
        leads::where('id', $id)->delete();
        $this->flashmessage('Lead Deleted Successfully', 0);
        return response()->json(['success' => true]);
    }

    public function leadajaxdata(Request $request)
    {
        $data = $request->input();
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowPerPage = $request->get("length");
        $orderArray = $request->get('order', []);
        $columnNameArray = $request->get('columns', []);
        $searchArray = $request->get('search', []);
        $columnIndex = isset($orderArray[0]['column']) ? $orderArray[0]['column'] : 0;
        $columnName = isset($columnNameArray[$columnIndex]['data']) ? $columnNameArray[$columnIndex]['data'] : 'id';
        $columnSortOrder = isset($orderArray[0]['dir']) ? $orderArray[0]['dir'] : 'desc';
        $searchValue = isset($searchArray['value']) ? $searchArray['value'] : '';

        $query = leads::query();

        if ($data['leadid'] != '') {
            $query->where('status', $data['leadid']);
        }

        if ($request->filled('source') && $request->source != '') {
            $query->where('source', $request->source);
        }

        if ($request->filled('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('subject', 'like', '%' . $search . '%')
                    ->orWhere('message', 'like', '%' . $search . '%');
            });
        }

        $daterange = $request->daterange;

        if (!empty($daterange)) {
            $dates = explode(' to ', $daterange);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(DB::raw("STR_TO_DATE(leads.date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        $totalRecords = $query->count();
        
        if ($rowPerPage != -1) {
            $results = $query->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowPerPage)
                ->get();
        } else {
            $results = $query->orderBy($columnName, $columnSortOrder)
                ->get();
        }

        $user = session('admin');
        $isAdmin = $user && in_array($user->user_type, ['super_admin', 'sub_admin']);

        $newarr = [];
        if ($results->isNotEmpty()) {
            $i = 1;
            foreach ($results as $k => $value) {
                $checkbox = '<th>
                               <div class="form-check">
                                    <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $k . '" value="' . $value->id . '">
                                </div> 
                            </th>';

                $action = '<div>';
                 if ($isAdmin) {
                    $action .= '<button data-id="' . $value->id . '" class="btn mb-1 me-1 btn-primary btn-sm d-inline-flex align-items-center justify-content-center edit-btn" title="Edit Lead" data-bs-toggle="modal" data-bs-target="#editleads-modal">
                                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                </button>';
                    $action .= '<button data-id="' . $value->id . '" data-rownumber = "' . $i . '" class="btn mb-1 me-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata" data-table="leads" data-field="id" data-rownumber="' . $k . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Lead">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>';
                    if ($value->status != 3 && $value->status != 2) {
                        $action .= '<button data="' . $value->id . '" class="btn mb-1 me-1 btn-secondary btn-sm d-inline-flex align-items-center justify-content-center followup" title="Lead Followup" data-bs-toggle="modal" data-bs-target="#followup-modal">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </button>';
                    }

                    $action .= '<button data-id="' . $value->id . '" class="btn mb-1 me-1 btn-dark btn-sm d-inline-flex align-items-center justify-content-center sendmail" title="Send Mail" data-bs-toggle="modal" data-bs-target="#leadsmail-modal">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </button>';
                }
                $action .= '</div>';

                $history = '<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#history-modal" data=' . $value->id . ' title="Lead History" class="history link-primary link-offset-2">' . $value->name . '</a>';

                $status = '';
                $status .= '<select class="select2 form-control form-select selstatus" data="' . $value->id . '" data-rownumber = "' . $i . '" ' . (!$isAdmin ? 'disabled' : '') . '>
                              <option value="0" ' . ($value->status == 0 ? 'selected' : '') . ' >New</option>
                              <option value="1" ' . ($value->status == 1 ? 'selected' : '') . ' >Processing</option>
                              <option value="2" ' . ($value->status == 2 ? 'selected' : '') . ' >Confirm</option>
                              <option value="3" ' . ($value->status == 3 ? 'selected' : '') . ' >Cancel</option>
                            </select>';

                $source = '';
                switch ($value->source) {
                    case 0:
                        $source .= '<span class="badge bg-danger-subtle text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                    <i class="ti ti-clock-hour-4 fs-3"></i>Offline
                                </span>';
                        break;
                    case 1:
                        $source .= ' <span class="badge bg-success-subtle text-success fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                        <i class="ti ti-circle fs-3"></i>Website
                                    </span>';
                        break;
                    default:
                        $source .= '';
                        break;
                }

                $newarr[] = array(
                    'id' => $i++,
                    '' => $checkbox,
                    'name' => $history,
                    'mobile' => '+' . $value->country_code . ' ' . $value->mobile,
                    'email' => $value->email,
                    'source' => $source,
                    'date' => $value->date,
                    'subject' => $value->subject,
                    'message' => $value->message,
                    'status' => $status,
                    'action' => $action,
                );
            }
        }
        
        $totalFiltered = $totalRecords;

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => $newarr,
        );

        return response()->json($response);
    }

    public function leadfollowup(Request $request)
    {
        $tz = session('admin_timezone', config('app.timezone'));
        leadfollow::create([
            'l_id' => $request->input('l_id'),
            'date' => Carbon::now($tz),
            'comment' => $request->input('comment'),
            'n_f_date' => Carbon::parse($request->input('n_f_date'), $tz),
        ]);

        leads::where('id', $request->input('l_id'))->update(['status' => 1]);

        $this->flashmessage('Lead Followed successfully', 0);
        return redirect()->back();
    }

    public function leadcancel(Request $request)
    {
        $data = $request->input();
        $leadId = $data['leadcancel_id'];
        $cancelReason = $data['cancel_reason'];

        $lead = leads::find($leadId);
        if ($lead) {
            $lead->status = 3;
            $lead->cancel_reason = $cancelReason;
            $lead->save();
        } else {
            return response()->json(['success' => false, 'message' => 'Lead not found'], 404);
        }

        $this->flashmessage('Lead Cancelled successfully', 0);
        return redirect()->back();
    }

    public function leadmail(Request $request)
    {
        $data = $request->input();
        $lead = leads::find($data['leadmail_id']);
        $template = emailtemplate::find($data['e_id']);

        if (!$lead || !$template) {
            $this->flashmessage('Lead or Email Template not found.', 1);
            return redirect()->back();
        }

        $attach = email_attachment::where('e_id', $data['e_id'])->get();
        $attachment = array();
        foreach ($attach as $v) {
            array_push($attachment, public_path('assets/admin/images/emailattachment/' . $v->url));
        }
        $msg = $template->template;
        $msg = str_replace("{:name:}", $lead->name, $msg);
        $msg = str_replace("{:email:}", $lead->email, $msg);
        $msg = str_replace("{:number:}", $lead->mobile, $msg);

        $websetting = websetting::first();
        if (isset($websetting->receive_inquiry_email) && !empty($websetting->receive_inquiry_email) && !empty($websetting->smtp_host) && !empty($websetting->smtp_port) && !empty($websetting->smtp_user) && !empty($websetting->smtp_password) && !empty($websetting->from)) 
        {
            $this->emailsend($lead['email'], $template->title, $msg, $attachment);
            $this->flashmessage('Mail Send Successfully', 0);
            return redirect()->back();
        } else{
            $this->flashmessage('SMTP Crendential Invalid', 1);
            return redirect()->back();
        }
    }

    public function leadhistory($id)
    {
        $lead = leads::with('leadfollow')->find($id);
        if (!$lead) {
            return response()->json(['error' => 'Lead not found'], 404);
        }

        $flead = '';
        if ($lead->leadfollow->isNotEmpty()) {
            foreach ($lead->leadfollow as $key => $followup) {
                $flead .= '<div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading' . $followup->id . '">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $followup->id . '"  aria-expanded="false" aria-controls="flush-collapse' . $followup->id . '">
                                        ' . $lead->name . '  (' . $followup->date . ')
                                    </button>
                                </h2>
                                <div id="flush-collapse' . $followup->id . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . $followup->id . '" data-bs-parent="#accordionFlushExample"> 
                                    <div class="accordion-body" id="n_f_date">
                                        <div>
                                            <label class="form-label text-left col-md-3"> Next Followup Date:</label> 
                                            <div class="col-md-12">
                                                <p class="mb-0">' . $followup->n_f_date . '</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <label class="form-label text-left col-md-3"> Comment:</label> 
                                            <div class="col-md-12">
                                                <p class="mb-0">' . $followup->comment . '</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
        }

        $status = '';
        switch ($lead->status) {
            case 0:
                $status .= '<span class="mb-1 badge text-bg-primary">Pending</span>';
                break;
            case 1:
                $status .= '<span class="mb-1 badge text-bg-warning">Processing</span>';
                break;
            case 2:
                $status .= '<span class="mb-1 badge text-bg-success">Confirmed</span>';
                break;
            case 3:
                $status .= '<span class="mb-1 badge text-bg-danger">Cancelled</span>';
                break;
            default:
                $status .= '';
                break;
        }

        $source = '';
        switch ($lead->source) {
            case 0:
                $source .= '<span class="badge bg-danger-subtle text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                            <i class="ti ti-clock-hour-4 fs-3"></i>Offline
                        </span>';
                break;
            case 1:
                $source .= ' <span class="badge bg-success-subtle text-success fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                <i class="ti ti-circle fs-3"></i>Website
                            </span>';
                break;
            default:
                $source .= '';
                break;
        }

        $history = [
            'name' => $lead->name,
            'mobile' => '+' . $lead->country_code . ' ' . $lead->mobile,
            'email' => $lead->email,
            'source' => $source,
            'date' => $lead->date,
            'message' => $lead->message,
            'status' => $status,
            'leadstatus' => $lead->status,
            'subject' => $lead->subject,
            'followup' => $flead,
            'cancelreason' => $lead->cancel_reason,
        ];
        echo json_encode($history);
    }

    public function leadstatus(Request $request)
    {
        $data = $request->all();
        $user = session('admin');
        if (!$user || !in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have permission to update status.'
            ], 400);
        }
        $lead = leads::find($data['leadid']);
        if ($lead) {
            $lead->status = $data['status'];
            $lead->cancel_reason = null;
            $lead->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    public function readnotification($id)
    {
        leads::where('id', $id)->update(['notification_status' => 1]);
        return response()->json(['success' => true]);
    }

    public function readallnotifications()
    {
        try {
            leads::where('notification_status', 0)->update(['notification_status' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
