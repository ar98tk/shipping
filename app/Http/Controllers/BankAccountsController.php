<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BankAccountsController extends Controller
{
    public function index(){
        $bank_accounts  = BankAccount::all();
        return view('bank_accounts.index',compact('bank_accounts'));
    }

    public function edit($id)
    {
        $bank_account = BankAccount::where('id', '=', $id)->first();
        return view('bank_accounts.edit', compact('bank_account'));
    }

    public function update(Request $request,$id){
        $bank_account = BankAccount::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(),[
            'image'                  => 'nullable|mimes:png,jpg,jpeg',
            'name_ar'                => 'required',
            'name_en'                => 'required',
            'number'                 => 'required',
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل حساب البنك.');
            return redirect()->route('bank_accounts.index');
        }

        $bank_account->name_ar               = $request->name_ar;
        $bank_account->name_en               = $request->name_en;
        $bank_account->number                = $request->number;

        if ($image = $request->file('image')) {
            if ($bank_account->image != '') {
                if (File::exists('assets/bank_accounts_image/' . $bank_account->image)) {
                    unlink('assets/bank_accounts_image/' . $bank_account->image);
                }
            }
            $filename =  time().'-'.Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/bank_accounts_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $bank_account->image       = $filename;
        }

        $bank_account->update();
        toastr()->success('تم تعديل حساب البنك بنجاح!');
        return redirect()->route('bank_accounts.index');
    }

    public function store(Request $request){

        $validate = Validator::make($request->all(),[
            'image'                  => 'required|mimes:png,jpg,jpeg',
            'name_ar'                => 'required',
            'name_en'                => 'required',
            'number'                 => 'required',
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم اضافة حساب البنك.');
            return redirect()->route('bank_accounts.index');
        }
        $bank_account = new BankAccount();
        $bank_account->name_ar               = $request->name_ar;
        $bank_account->name_en               = $request->name_en;
        $bank_account->number                = $request->number;

        if ($image = $request->file('image')) {
            if ($bank_account->image != '') {
                if (File::exists('assets/bank_accounts_image/' . $bank_account->image)) {
                    unlink('assets/bank_accounts_image/' . $bank_account->image);
                }
            }
            $filename =  time().'-'.Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/bank_accounts_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $bank_account->image       = $filename;
        }
        $bank_account->save();
        toastr()->success('تم اضافة حساب البنك بنجاح!');
        return redirect()->route('bank_accounts.index');
    }

    public function destroy(Request $request){
        $bank_account = BankAccount::findOrFail($request->id);
        $bank_account->delete();
        toastr()->success('تم حذف حساب البنك بنجاح');
        return redirect()->route('bank_accounts.index');
    }

}
