<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhonesController extends Controller
{
    public function index(){
        $phones  = Phone::all();
        return view('phones.index',compact('phones'));
    }

    public function updateStatus( Request $request, $id)
    {
        $phone = Phone::where('id', '=', $id)->first();
        if($phone->is_active == 1)
        {
            $phone->is_active = 0;
            $phone->update();
            toastr()->success('تم تحديث حالة الرقم بنجاح');
            return redirect()->route('phones.index');

        } elseif ($phone->is_active == 0) {
            $phone->is_active = 1;
            $phone->update();
            toastr()->success('تم تحديث حالة الرقم بنجاح');
            return redirect()->route('phones.index');
        }
    }

    public function destroy(Request $request){
        $phone = Phone::findOrFail($request->id);
        $phone->delete();
        toastr()->success('تم حذف الرقم بنجاح');
        return redirect()->route('phones.index');
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'phone' => 'required',
            'is_active' => 'required|min:0|max:1',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة الرقم.');
            return redirect()->route('phones.index');
        }
        $phone = new Phone();
        $phone->phone               = $request->phone;
        $phone->is_active           = $request->is_active;
        $phone->save();
        toastr()->success('تم اضافة الرقم بنجاح!');
        return redirect()->route('phones.index');
    }

    public function edit($id)
    {
        $phone = Phone::where('id', '=', $id)->first();
        return view('phones.edit', compact('phone'));
    }

    public function update(Request $request,$id){

        $phone = Phone::where('id', '=', $id)->first();
        $validate = Validator::make($request->all(), [
            'phone' => 'required',
            'is_active' => 'required|min:0|max:1',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل الرقم.');
            return redirect()->route('phones.index');
        }

        $phone->phone               = $request->phone;
        $phone->is_active           = $request->is_active;
        $phone->update();

        toastr()->success('تم تعديل الرقم بنجاح!');
        return redirect()->route('phones.index');
    }
}
