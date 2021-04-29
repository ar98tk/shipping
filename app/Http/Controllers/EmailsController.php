<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailsController extends Controller
{
    public function index(){
        $emails  = Email::all();
        return view('emails.index',compact('emails'));
    }

    public function updateStatus( Request $request, $id)
    {
        $email = Email::where('id', '=', $id)->first();
        if($email->is_active == 1)
        {
            $email->is_active = 0;
            $email->update();
            toastr()->success('تم تحديث حالة الايميل بنجاح');
            return redirect()->route('emails.index');

        } elseif ($email->is_active == 0) {
            $email->is_active = 1;
            $email->update();
            toastr()->success('تم تحديث حالة الايميل بنجاح');
            return redirect()->route('emails.index');
        }
    }

    public function destroy(Request $request){
        $email = Email::findOrFail($request->id);
        $email->delete();
        toastr()->success('تم حذف الايميل بنجاح');
        return redirect()->route('emails.index');
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'is_active' => 'required|min:0|max:1',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة الايميل.');
            return redirect()->route('emails.index');
        }
        $email = new Email();
        $email->email               = $request->email;
        $email->is_active           = $request->is_active;
        $email->save();
        toastr()->success('تم اضافة الايميل بنجاح!');
        return redirect()->route('emails.index');
    }

    public function edit($id)
    {
        $email = Email::where('id', '=', $id)->first();
        return view('emails.edit', compact('email'));
    }

    public function update(Request $request,$id){

        $email = Email::where('id', '=', $id)->first();
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'is_active' => 'required|min:0|max:1',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل الايميل.');
            return redirect()->route('emails.index');
        }

        $email->email               = $request->email;
        $email->is_active           = $request->is_active;
        $email->update();

        toastr()->success('تم تعديل الايميل بنجاح!');
        return redirect()->route('emails.index');
    }
}
