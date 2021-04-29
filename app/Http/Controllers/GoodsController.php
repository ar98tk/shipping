<?php

namespace App\Http\Controllers;

use App\Models\GoodsTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoodsController extends Controller
{
    public function index(){
        $goods  = GoodsTypes::all();
        return view('goods.index',compact('goods'));
    }

    public function edit($id)
    {
        $good = GoodsTypes::where('id', '=', $id)->first();
        return view('goods.edit', compact('good'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name_ar'     => 'required',
            'name_en'     => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة نوع البضائع.');
            return redirect()->route('goods.index');
        }

        $contacts_type = new GoodsTypes();
        $contacts_type->name_ar         = $request->name_ar;
        $contacts_type->name_en         = $request->name_en;
        $contacts_type->save();
        toastr()->success('تم اضافة نوع البضائع بنجاح!');
        return redirect()->route('goods.index');
    }

    public function update(Request $request,$id)
    {
        $contacts_type = GoodsTypes::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(), [
            'name_ar'     => 'required',
            'name_en'     => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل نوع البضائع.');
            return redirect()->route('goods.index');
        }
        $contacts_type->name_ar         = $request->name_ar;
        $contacts_type->name_en         = $request->name_en;

        $contacts_type->update();
        toastr()->success('تم تعديل نوع البضائع بنجاح!');
        return redirect()->route('goods.index');
    }
}
