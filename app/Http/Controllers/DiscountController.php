<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    public function index(){
        $discounts  = DiscountCode::all();
        return view('discounts.index',compact('discounts'));
    }

    public function updateStatus( Request $request, $id)
    {
        $code = DiscountCode::where('id', '=', $id)->first();
        if($code->is_active == 1)
        {
            $code->is_active   = 0;
            $code->update();
            toastr()->success('تم تحديث حالة كود الخصم بنجاح');
            return redirect()->route('discounts.index');
        } elseif($code->is_active == 0) {
            $code->is_active = 1;
            $code->update();
            toastr()->success('تم تحديث حالة كود الخصم بنجاح');
            return redirect()->route('discounts.index');
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'code'                   => 'required',
            'count'                  => 'required|numeric',
            'discount'               => 'required|numeric',
            'is_active'              => 'required|min:0|max:1',
            'end_date'               => 'required|date',
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم اضافة كود الخصم');
            return redirect()->route('discounts.index');
        }
        $discount = new DiscountCode();
        $discount->code               = $request->code;
        $discount->discount           = $request->discount;
        $discount->count          = $request->count;
        $discount->is_active        = $request->is_active;
        $discount->end_date              = $request->end_date;
        $discount->save();
        toastr()->success('تم اضافة كود الخصم بنجاح!');
        return redirect()->route('discounts.index');
    }

    public function update(Request $request,$id){
        $discount = DiscountCode::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(),[
            'code'                   => 'required',
            'count'                  => 'required|numeric',
            'discount'               => 'required|numeric',
            'is_active'              => 'required|min:0|max:1',
            'end_date'               => 'nullable|date',
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل كود الخصم');
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }
        $discount->code               = $request->code;
        $discount->discount           = $request->discount;
        $discount->count          = $request->count;
        $discount->is_active        = $request->is_active;
        $discount->end_date              = $request->end_date;
        $discount->update();
        toastr()->success('تم تعديل كود الخصم بنجاح!');
        return redirect()->route('discounts.index');
    }

    public function edit($id)
    {
        $discount = DiscountCode::where('id', '=', $id)->first();
        return view('discounts.edit', compact('discount'));
    }
}
