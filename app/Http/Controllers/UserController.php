<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function updateStatus($id)
    {
        $user = User::where('id', '=', $id)->first();

        if($user->is_active == 1)
        {
            $user->is_active = 0;
            $user->update();
            toastr()->success('تم تحديث حالة المشترك بنجاح');
            return redirect()->route('users.index');

        } elseif ($user->is_active == 0) {
            $user->is_active = 1;
            $user->update();
            toastr()->success('تم تحديث حالة المشترك بنجاح');
            return redirect()->route('users.index');
        }
    }
}
