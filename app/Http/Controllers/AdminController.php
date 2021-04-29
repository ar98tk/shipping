<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        $admins = Admin::where('type', '=', 'admin')->get();
        return view('admins.index',compact('admins'));
    }


    public function destroy(Request $request){
        $admin = Admin::findOrFail($request->id);
        $admin->delete();
        toastr()->success('تم حذف المدير بنجاح');
        return redirect()->route('admins.index');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة المدير.');
            return redirect()->route('admins.index');
        }
        $admin = new Admin();
        $admin->name                = $request->name;
        $admin->email               = $request->email;
        $admin->phone               = $request->phone;
        $admin->role                = $request->role;
        $admin->type                = 'admin';
        $admin->password            = Hash::make($request->password);
        $admin->save();
        toastr()->success('تم اضافة المدير بنجاح!');
        return redirect()->route('admins.index');
    }

    public function edit($id)
    {
        $admin = Admin::where('id', '=', $id)->first();
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request,$id){

        $admin = Admin::where('id', '=', $id)->first();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'nullable',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل المدير.');
            return redirect()->route('admins.index');
        }
        $admin->name                = $request->name;
        $admin->email               = $request->email;
        $admin->phone               = $request->phone;
        $admin->role                = $request->role;
        $admin->type                = 'admin';
        $admin->password            = Hash::make($request->password);
        $admin->update();

        toastr()->success('تم تعديل المدير بنجاح!');
        return redirect()->route('admins.index');
    }
}
