<?php

namespace App\Http\Controllers;

use App\Models\TrucksTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TrucksTypesController extends Controller
{
    public function index(){
        $trucks  = TrucksTypes::all();
        return view('trucks.index',compact('trucks'));
    }

    public function edit($id)
    {
        $truck = TrucksTypes::where('id', '=', $id)->first();
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request,$id){
        $truck = TrucksTypes::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(),[
            'image'                  => 'nullable|mimes:png,jpg,jpeg',
            'name_ar'                => 'required',
            'name_en'                => 'required',
            'is_active'              => 'required|min:0|max:1',
            'descriptions_ar'        => 'nullable',
            'descriptions_en'        => 'nullable',
            'max_weight'             => 'nullable|numeric',
            'area'                   => 'nullable|numeric',
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل الشاحنة.');
            return redirect()->route('trucks.index');
        }

        $truck->name_ar               = $request->name_ar;
        $truck->name_en               = $request->name_en;
        $truck->is_active             = $request->is_active;
        $truck->descriptions_ar       = $request->descriptions_ar;
        $truck->descriptions_en       = $request->descriptions_en;
        $truck->max_weight            = $request->max_weight;
        $truck->area                  = $request->area;

        if ($image = $request->file('image')) {
            if ($truck->image != '') {
                if (File::exists('assets/truck_image/' . $truck->image)) {
                    unlink('assets/truck_image/' . $truck->image);
                }
            }
            $filename =  time().'-'.Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/truck_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $truck->image       = $filename;
        }

        $truck->update();
        toastr()->success('تم تعديل الشاحنة بنجاح!');
        return redirect()->route('trucks.index');
    }

    public function store(Request $request){

        $validate = Validator::make($request->all(),[
            'image'                  => 'required|mimes:png,jpg,jpeg',
            'name_ar'                => 'required',
            'name_en'                => 'required',
            'is_active'              => 'required|min:0|max:1',
            'descriptions_ar'        => 'nullable',
            'descriptions_en'        => 'nullable',
            'max_weight'             => 'nullable|numeric',
            'area'                   => 'nullable|numeric',
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم إضافة الشاحنة.');
            return redirect()->route('trucks.index');
        }
        $truck = new TrucksTypes();
        $truck->name_ar               = $request->name_ar;
        $truck->name_en               = $request->name_en;
        $truck->is_active             = $request->is_active;
        $truck->descriptions_ar       = $request->descriptions_ar;
        $truck->descriptions_en       = $request->descriptions_en;
        $truck->max_weight            = $request->max_weight;
        $truck->area                  = $request->area;

        if ($image = $request->file('image')) {
            if ($truck->image != '') {
                if (File::exists('assets/truck_image/' . $truck->image)) {
                    unlink('assets/truck_image/' . $truck->image);
                }
            }
            $filename =  time().'-'.Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/truck_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $truck->image       = $filename;
        }
        $truck->save();
        toastr()->success('تم اضافة الشاحنة بنجاح!');
        return redirect()->route('trucks.index');
    }

    public function updateStatus( Request $request, $id)
    {
        $truck = TrucksTypes::where('id', '=', $id)->first();
        if($truck->is_active == 1)
        {
            $truck->is_active = 0;
            $truck->update();
            toastr()->success('تم تحديث حالة الشاحنة بنجاح');
            return redirect()->route('trucks.index');

        } elseif ($truck->is_active == 0) {
            $truck->is_active = 1;
            $truck->update();
            toastr()->success('تم تحديث حالة الشاحنة بنجاح');
            return redirect()->route('trucks.index');
        }
    }

    public function destroy(Request $request){
        $truck = TrucksTypes::findOrFail($request->id);
        $truck->delete();
        toastr()->success('تم حذف الشاحنة بنجاح');
        return redirect()->route('trucks.index');
    }
}
