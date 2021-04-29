<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
            ->join('bills','orders.id','=','bills.orders_id')
            ->join('users','orders.users_id','=','users.id')
            ->join('drivers','orders.drivers_id','=','drivers.id')
            ->select('orders.*','bills.cost','bills.payment_type','drivers.name as drivername',
                            'users.name as username','bills.status as billstatus')->get();
        return view('orders.index',compact('orders'));
    }

    public function updateStatus($id)
    {
        $order = Order::where('id', '=', $id)->first();

        if($order->status == 'awaitingPayment')
        {
            $order->status = 'acceptedByCompany';
            $order->update();
            toastr()->success('تم تحديث حالة الطلب بنجاح');
            return redirect()->route('orders.index');
        }
    }

}
