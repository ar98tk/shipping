<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
            ->where('orders.companies_id', '=', auth('admin')->user()->id)
            ->join('bills','orders.id','=','bills.orders_id')
            ->join('users','orders.users_id','=','users.id')
            ->join('drivers','orders.drivers_id','=','drivers.id')

            ->select('orders.*','bills.cost','bills.payment_type','drivers.name as drivername',
                'users.name as username','bills.status as billstatus')
            ->get();
        return view('company.orders.index',compact('orders'));
    }
}
