<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactsTypesController extends Controller
{
    public function index(){
        $contacts_types  = ContactType::all();
        return view('contacts_types.index',compact('contacts_types'));
    }

    public function edit($id)
    {
        $contacts_type = ContactType::where('id', '=', $id)->first();
        return view('contacts_types.edit', compact('contacts_type'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name_ar'     => 'required',
            'name_en'     => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة نوع الرسائل.');
            return redirect()->route('contacts_types.index');
        }

        $contacts_type = new ContactType();
        $contacts_type->name_ar         = $request->name_ar;
        $contacts_type->name_en         = $request->name_en;
        $contacts_type->save();
        toastr()->success('تم اضافة نوع الرسائل بنجاح!');
        return redirect()->route('contacts_types.index');
    }

    public function update(Request $request,$id)
    {
        $contacts_type = ContactType::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(), [
            'name_ar'     => 'required',
            'name_en'     => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل نوع الرسائل.');
            return redirect()->route('contacts_types.index');
        }
        $contacts_type->name_ar         = $request->name_ar;
        $contacts_type->name_en         = $request->name_en;

        $contacts_type->update();
        toastr()->success('تم تعديل نوع الرسائل بنجاح!');
        return redirect()->route('contacts_types.index');
    }
}
