<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leads;
use App\Models\transactions;
use App\Models\withdrawals;
use App\Models\stores;
use Carbon\Carbon;
use Session;
use DB;

class DashboardController extends Controller
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

    public function dashboard()
    {
        $data['newlead'] = $this->totalleads(0);
        $data['processlead'] = $this->totalleads(1);
        $data['confrimlead'] = $this->totalleads(2);
        $data['cancellead'] = $this->totalleads(3);
        $data['tnewlead'] = $this->todaysleads(0);
        $data['tprocessinglead'] = $this->todaysleads(1);
        $data['tconfirmclead'] = $this->todaysleads(2);
        $data['tcancellead'] = $this->todaysleads(3);

        $user = session('admin');
        if (!$user) {
            return response()->json(['data' => []]);
        }

        $timezone = session('admin_timezone', config('app.timezone'));
        $today = Carbon::now($timezone)->format('d-m-Y');

        // Staff dashboard: only their assigned store
        if ($user->user_type === 'staff') {
            $storeId = $user->store_id;

            $transactions = transactions::where('store_id', $storeId)->where('status', 'success')->get();
            $todayTransactions = transactions::where('store_id', $storeId)
                                            ->where('status', 'success')
                                            ->where('date', $today)
                                            ->get();
        } else {
            // For super admin: show all stores
            $transactions = transactions::where('status', 'success')->get();
            $todayTransactions = transactions::where('status', 'success')
                                            ->where('date', $today)
                                            ->get();
                                
            $withdrawals = withdrawals::where('is_deleted', 0)->get();
            $todayWithdrawals = withdrawals::where('is_deleted', 0)
                                            ->whereDate('processed_at', Carbon::now($timezone)->toDateString())
                                            ->get();
        }

        $data['totalRevenue'] = $transactions->sum('amount');
        $data['totalTransactions'] = $transactions->count();
        $data['totalCustomers'] = $transactions->where('customer_email', '!=' ,'')->groupBy('customer_email')->count();

        $data['todayRevenue'] = $todayTransactions->sum('amount');
        $data['todayTransactionCount'] = $todayTransactions->count();

        $data['totalWithdrawals'] = ($user->user_type !== 'staff') ? $withdrawals->sum('amount') : 0;
        $data['todayWithdrawals'] = ($user->user_type !== 'staff') ? $todayWithdrawals->sum('amount') : 0;
        $data['netRevenue'] = ($user->user_type !== 'staff')
            ? $data['totalRevenue'] - $data['totalWithdrawals']
            : $data['totalRevenue'];

        $data['user'] = $user;
        if ($user->user_type !== 'staff') {
            $stores = stores::all();
            $data['shopRevenue'] = [];
            foreach ($stores as $store) {
                $storeTransactions = $transactions->where('store_id', $store->id);
                $storeWithdrawals = $withdrawals->where('store_id', $store->id);

                $totalTransactionAmount = $storeTransactions->sum('amount');
                $totalWithdrawalAmount = $storeWithdrawals->sum('amount');

                $data['shopRevenue'][] = [
                    'store_name' => $store->name,
                    'revenue' => $totalTransactionAmount,
                    'transactions' => $storeTransactions->count(),
                    'customers' => $storeTransactions->where('customer_email', '!=', '')
                        ->groupBy('customer_email')->count(),
                    'withdrawals' => $totalWithdrawalAmount,
                    'net_revenue' => $totalTransactionAmount - $totalWithdrawalAmount,
                ];
            }
        }

        return view('admin.dashboard', $data);
    }

    public function todaysleads($id)
    {
        return DB::table('leads')
            ->where('status', $id)
            ->whereRaw("STR_TO_DATE(date, '%d-%m-%Y') = CURDATE()")
            ->count();
    }

    public function totalleads($id)
    {
        return leads::where('status', $id)->count();
    }
}
