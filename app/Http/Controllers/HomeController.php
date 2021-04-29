<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth('admin')->check()  && auth('admin')->user()->type == 'admin'){
            return redirect()->route('admin.statistics');
        }elseif (auth('admin')->check()  && auth('admin')->user()->type == 'company'){
            return redirect()->route('company.statistics');
        }else{
            return redirect()->route('login');
        }
    }
}
