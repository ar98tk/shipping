<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FinancialController extends Controller
{
    public function index(){
        $financials  =  DB::table('financials')
            ->join('drivers', 'financials.drivers_id', '=', 'drivers.id')
            ->where('drivers.companies_id','=',auth('admin')->user()->id)
            ->select('financials.*', 'drivers.name')
            ->get();
        return view('company.financials.index',compact('financials'));
    }

    public function edit($id)
    {
        $financial = DB::table('financials')
            ->join('drivers','financials.drivers_id','=','drivers.id')
            ->select('financials.*','drivers.companies_id')
            ->where('financials.id', '=', $id)->first();

        if($financial->companies_id == auth('admin')->user()->id){
            return view('company.financials.edit', compact('financial'));
        }
        else{
            abort(403, 'Unauthorized');
        }
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
            return redirect()->route('company.financials.index');
        }

        $financial->total_benefit         = $request->total_benefit;
        $financial->paid_money            = $request->paid_money;
        $financial->update();
        toastr()->success('تم تعديل المعاملة المالية بنجاح!');
        return redirect()->route('company.financials.index');
    }
}
