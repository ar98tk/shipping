<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PricesController extends Controller
{
    public function index(){
        $prices  =  DB::table('price_list')
            ->join('trucks_types', 'price_list.trucks_types_id', '=', 'trucks_types.id')
            ->select('price_list.*', 'trucks_types.name_ar')
            ->get();
        return view('prices.index',compact('prices'));
    }

    public function edit($id)
    {
        $price = Price::where('id', '=', $id)->first();
        return view('prices.edit', compact('price'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category'        => 'required|numeric',
            'price'           => 'required|numeric',
            'trucks_types_id' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة التسعيرة.');
            return redirect()->route('prices.index');
        }

        $price = new Price();
        $price->category         = $request->category;
        $price->price         = $request->price;
        $price->trucks_types_id         = $request->trucks_types_id;
        $price->save();
        toastr()->success('تم اضافة التسعيرة بنجاح!');
        return redirect()->route('prices.index');
    }

    public function update(Request $request,$id)
    {
        $price = Price::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(), [
            'category'        => 'required|numeric',
            'price'           => 'required|numeric',
            'trucks_types_id' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل التسعيرة.');
            return redirect()->route('prices.index');
        }
        $price->category         = $request->category;
        $price->price         = $request->price;
        $price->trucks_types_id         = $request->trucks_types_id;
        $price->update();
        toastr()->success('تم تعديل التسعيرة بنجاح!');
        return redirect()->route('prices.index');
    }
}
