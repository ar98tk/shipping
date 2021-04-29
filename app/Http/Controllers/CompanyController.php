<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(){
        $companies = Admin::where('type', '=', 'company')->get();
        return view('companies.index',compact('companies'));
    }

    public function updateStatus( Request $request, $id)
    {
        $driver = Admin::where('id', '=', $id)->first();
        if($driver->is_active ==  1)
        {
            $driver->is_active   = 0;
            $driver->update();
            toastr()->success('تم تحديث حالة الشركة بنجاح');
            return redirect()->route('companies.index');
        } elseif($driver->is_active == 0) {
            $driver->is_active = 1;
            $driver->update();
            toastr()->success('تم تحديث حالة الشركة بنجاح');
            return redirect()->route('companies.index');
        }
    }

    public function destroy(Request $request){
        $company = Admin::findOrFail($request->id);
        $company->delete();
        toastr()->success('تم حذف الشركة بنجاح');
        return redirect()->route('companies.index');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'phone' => 'required',
            'is_active' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة الشركة.');
            return redirect()->route('companies.index');
        }
        $company = new Admin();
        $company->name                = $request->name;
        $company->email               = $request->email;
        $company->phone               = $request->phone;
        $company->is_active           = $request->is_active;
        $company->type                = 'company';
        $company->password            = Hash::make($request->password);
        $company->save();
        toastr()->success('تم اضافة الشركة بنجاح!');
        return redirect()->route('companies.index');
    }

    public function edit($id)
    {
        $company = Admin::where('id', '=', $id)->first();
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request,$id){

        $company = Admin::where('id', '=', $id)->first();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'is_active' => 'nullable',
            'password' => 'nullable',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل الشركة.');
            return redirect()->route('companies.index');
        }
        $company->name                = $request->name;
        $company->email               = $request->email;
        $company->phone               = $request->phone;
        $company->is_active           = $request->is_active;
        $company->type                = 'company';
        $company->password            = Hash::make($request->password);
        $company->update();

        toastr()->success('تم تعديل الشركة بنجاح!');
        return redirect()->route('companies.index');
    }
}
