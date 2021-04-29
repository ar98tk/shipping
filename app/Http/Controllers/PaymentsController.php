<?php

namespace App\Http\Controllers;

use App\Models\OfflinePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function index(){

        $payments  =  DB::table('offline_payment')
            ->join('bills', 'offline_payment.bills_id', '=', 'bills.id')
            ->join('orders', 'bills.orders_id', '=', 'orders.id')
            ->join('users', 'orders.users_id', '=', 'users.id')
            ->select('offline_payment.*', 'bills.cost','users.name')
            ->get();

        return view('payments.index',compact('payments'));
    }

    public function updateStatus($id)
    {
        $contact = OfflinePayment::where('id', '=', $id)->first();

        if($contact->admin_approve == null)
        {
            $contact->admin_approve = 1;
            $contact->update();
            toastr()->success('تم تحديث حالة طلب الدفع بنجاح');
            return redirect()->route('payments.index');

        } elseif ($contact->admin_approve == 1) {
            $contact->admin_approve = null;
            $contact->update();
            toastr()->success('تم تحديث حالة طلب الدفع بنجاح');
            return redirect()->route('payments.index');
        }
    }
}
