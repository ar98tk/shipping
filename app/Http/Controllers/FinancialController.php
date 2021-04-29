<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FinancialController extends Controller
{
    public function index(){
        $financials  =  DB::table('financials')
            ->join('drivers', 'financials.drivers_id', '=', 'drivers.id')
            ->select('financials.*', 'drivers.name')
            ->get();
        return view('financials.index',compact('financials'));
    }

    public function edit($id)
    {
        $financial = Financial::where('id', '=', $id)->first();
        return view('financials.edit', compact('financial'));
    }

    public function update(Request $request,$id)
    {
        $financial = Financial::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(), [
            'total_benefit'        => 'required|numeric',
            'paid_money'           => 'required|numeric',
        ]);

        if ($validate->fails()) {
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل المعاملة المالية.');
            return redirect()->route('financials.index');
        }
        $financial->total_benefit         = $request->total_benefit;
        $financial->paid_money            = $request->paid_money;
        $financial->update();
        toastr()->success('تم تعديل المعاملة المالية بنجاح!');
        return redirect()->route('financials.index');
    }
}
