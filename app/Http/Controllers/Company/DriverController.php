<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class DriverController extends Controller
{
    public function index(){
        $drivers  = Driver::where('companies_id','=',auth('admin')->user()->id)->get();
        return view('company.drivers.index',compact('drivers'));
    }

    public function updateStatus($id)
    {
        $driver = Driver::where('id', '=', $id)->first();
        if($driver->is_active ==  1)
        {
            $driver->is_active   = 0;
            $driver->update();
            toastr()->success('تم تحديث حالة السائق بنجاح');
            return redirect()->route('company.drivers.index');
        } elseif($driver->is_active == 0) {
            $driver->is_active = 1;
            $driver->update();
            toastr()->success('تم تحديث حالة السائق بنجاح');
            return redirect()->route('company.drivers.index');
        }
    }

    public function edit($id)
    {
        $driver = Driver::where('id', '=', $id)->first();
        return view('company.drivers.edit', compact('driver'));
    }

    public function update(Request $request,$id){
        $driver = Driver::where('id', '=', $id)->first();

        $validate = Validator::make($request->all(),[
            'image'                  => 'nullable|mimes:png,jpg,jpeg',
            'car_photo'              => 'nullable|mimes:png,jpg,jpeg',
            'driving_license_image'  => 'nullable|mimes:png,jpg,jpeg',
            'car_license_image'      => 'nullable|mimes:png,jpg,jpeg',
            'id_image'               => 'nullable|mimes:png,jpg,jpeg',

            'name'                   => 'required',
            'country_code'           => 'required',
            'car_name'               => 'required',
            'car_model'              => 'required',
            'car_license_number'     => 'required',
            //'phone'                  => 'required|unique:drivers|digits_between:7,25|numeric',
            'phone'                  => ['required','digits_between:7,25','numeric', Rule::unique('drivers')->ignore($driver)],
            'password'               => 'nullable|digits_between:6,30',
            'language'               => 'required|in:ar,en'
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم تعديل السائق');
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }
        $driver->name               = $request->name;
        $driver->car_name           = $request->car_name;
        $driver->car_model          = $request->car_model;
        $driver->car_license_number = $request->car_license_number;
        $driver->phone              = $request->phone;
        $driver->language           = $request->language;
        $driver->country_code       = $request->country_code;
        $driver->trucks_types_id    = $request->trucks_types_id;
        $driver->password           = Hash::make($request->password);
        $driver->api_token          = Str::random(65);

        if ($image = $request->file('image')) {
            if ($driver->image != '') {
                if (File::exists('assets/driver_image/' . $driver->image)) {
                    unlink('assets/driver_image/' . $driver->image);
                }
            }
            $filename =  time().'-'.Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/driver_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->image       = $filename;
        }

        if ($image = $request->file('car_photo')) {
            if ($driver->car_photo != '') {
                if (File::exists('assets/car_photo/' . $driver->car_photo)) {
                    unlink('assets/car_photo/' . $driver->car_photo);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/car_photo/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->car_photo       = $filename;
        }

        if ($image = $request->file('driving_license_image')) {
            if ($driver->driving_license_image != '') {
                if (File::exists('assets/driving_license_image/' . $driver->driving_license_image)) {
                    unlink('assets/driving_license_image/' . $driver->driving_license_image);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/driving_license_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->driving_license_image  = $filename;
        }

        if ($image = $request->file('car_license_image')) {
            if ($driver->car_license_image != '') {
                if (File::exists('assets/car_license_image/' . $driver->car_license_image)) {
                    unlink('assets/car_license_image/' . $driver->car_license_image);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/car_license_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->car_license_image  = $filename;
        }

        if ($image = $request->file('id_image')) {
            if ($driver->id_image != '') {
                if (File::exists('assets/id_image/' . $driver->id_image)) {
                    unlink('assets/id_image/' . $driver->id_image);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/id_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->id_image  = $filename;
        }
        $driver->update();
        toastr()->success('تم تعديل السائق بنجاح!');
        //Driver::create($data);
        return redirect()->route('company.drivers.index');
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'image'                  => 'required|mimes:png,jpg,jpeg',
            'car_photo'              => 'required|mimes:png,jpg,jpeg',
            'driving_license_image'  => 'required|mimes:png,jpg,jpeg',
            'car_license_image'      => 'required|mimes:png,jpg,jpeg',
            'id_image'               => 'required|mimes:png,jpg,jpeg',

            'name'                   => 'required',
            'country_code'           => 'required',
            'car_name'               => 'required',
            'car_model'              => 'required',
            'car_license_number'     => 'required',
            'phone'                  => 'required|unique:drivers|digits_between:7,25|numeric',
            'password'               => 'required|digits_between:6,30',
            'language'               => 'required|in:ar,en'
        ]);

        if($validate->fails()){
            toastr()->error('يوجد بعض البيانات الخاطئة ، لم يتم اضافة السائق');
            return redirect()->route('company.drivers.index');
        }
        $driver = new Driver();
        $driver->name               = $request->name;
        $driver->car_name           = $request->car_name;
        $driver->car_model          = $request->car_model;
        $driver->car_license_number = $request->car_license_number;
        $driver->phone              = $request->phone;
        $driver->language           = $request->language;
        $driver->country_code       = $request->country_code;
        $driver->trucks_types_id    = $request->trucks_types_id;
        $driver->companies_id       = auth('admin')->user()->id;
        $driver->password           = Hash::make($request->password);
        $driver->api_token          = Str::random(65);

        if ($image = $request->file('image')) {
            if ($driver->image != '') {
                if (File::exists('assets/driver_image/' . $driver->image)) {
                    unlink('assets/driver_image/' . $driver->image);
                }
            }
            $filename =  time().'-'.Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/driver_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->image       = $filename;
        }

        if ($image = $request->file('car_photo')) {
            if ($driver->car_photo != '') {
                if (File::exists('assets/car_photo/' . $driver->car_photo)) {
                    unlink('assets/car_photo/' . $driver->car_photo);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/car_photo/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->car_photo       = $filename;
        }

        if ($image = $request->file('driving_license_image')) {
            if ($driver->driving_license_image != '') {
                if (File::exists('assets/driving_license_image/' . $driver->driving_license_image)) {
                    unlink('assets/driving_license_image/' . $driver->driving_license_image);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/driving_license_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->driving_license_image  = $filename;
        }

        if ($image = $request->file('car_license_image')) {
            if ($driver->car_license_image != '') {
                if (File::exists('assets/car_license_image/' . $driver->car_license_image)) {
                    unlink('assets/car_license_image/' . $driver->car_license_image);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/car_license_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->car_license_image  = $filename;
        }

        if ($image = $request->file('id_image')) {
            if ($driver->id_image != '') {
                if (File::exists('assets/id_image/' . $driver->id_image)) {
                    unlink('assets/id_image/' . $driver->id_image);
                }
            }
            $filename =  time().Str::random(7).'.'.$image->getClientOriginalExtension();
            $path = public_path("assets/id_image/" . $filename);
            Image::make($image->getRealPath())->resize(1920, 1053, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $driver->id_image  = $filename;
        }
        $driver->save();
        toastr()->success('تم اضافة السائق بنجاح!');
        return redirect()->route('company.drivers.index');
    }
}
