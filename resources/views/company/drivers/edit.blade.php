@extends('layouts.master')

@section('title')
    تعديل سائق
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">السائقين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                سائق ( {{ $driver->name }} )</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('company.drivers.index') }}">رجوع</a>
                        </div>
                    </div><br>
                    {!! Form::model($driver,['route' => ['company.drivers.update' , $driver->id], 'method' => 'put', 'files' => true]) !!}
                    <div class="row row-sm">

                        <div class="col-lg-12 col-xl-6">
                            <div class="card card-dashboard-map-one">
                                <div class="" style="width: 100%">
                                </div>
                                <div>
                                    {!! Html::decode(Form::label('phone', 'رقم الهاتف : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('phone', old('phone'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('country_code', 'رمز البلد : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('country_code', old('country_code'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('country_code')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('car_name', 'اسم موديل السيارة : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('car_name', old('car_name'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('car_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('car_model', 'سنة إصدار السيارة : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('car_model', old('car_model'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('car_model')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('car_license_number', 'رقم لوحة السيارة: <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('car_license_number', old('car_license_number'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('car_license_number')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                            </div>


                        </div>



                        <div class="col-md-12 col-lg-12 col-xl-6">
                            <div class="card">
                                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                    <div class="d-flex justify-content-between">
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('name', 'اسم السائق : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::text('name', old('name'),['class'=>'form-control form-control-sm mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('password', 'رقم السر : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::password('password' ,['class'=>'form-control form-control-sm mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('language', 'اللغة : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::select('language',  array("ar"=>"العربية","en" => "الأنجليزية"),old('language'), array('placeholder' => 'اختر اللغة',  'class' => 'form-control  nice-select  custom-select', 'tabindex' => '2',)) !!}
                                        @error('language')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('trucks_types_id', 'نوع السيارة : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::select('trucks_types_id',  App\Models\TrucksTypes::pluck('name_ar', 'id'),old('trucks_types_id'), array('placeholder' => 'اختر نوع السيارة',  'class' => 'form-control  nice-select  custom-select', 'tabindex' => '2',)) !!}
                                        @error('trucks_types_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-6">
                            <div class="card">
                                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                    <div class="d-flex justify-content-between">
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('image', 'صورة السائق: <span class="tx-danger">*</span>'))!!}
                                        {!! Form::file('image',['class'=>'form-control form-control"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('car_photo', 'صورة السيارة: <span class="tx-danger">*</span>'))!!}
                                        {!! Form::file('car_photo',['class'=>'form-control form-control"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('car_photo')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('driving_license_image', 'صورة رخصة قيادة السائق: <span class="tx-danger">*</span>'))!!}
                                        {!! Form::file('driving_license_image',['class'=>'form-control form-control"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('driving_license_image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('car_license_image', 'صورة رخصة السيارة: <span class="tx-danger">*</span>'))!!}
                                        {!! Form::file('car_license_image',['class'=>'form-control form-control"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('car_license_image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('id_image', 'صورة هوية السائق: <span class="tx-danger">*</span>'))!!}
                                        {!! Form::file('id_image',['class'=>'form-control form-control"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('id_image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        {!! Form::submit('تعديل', ['class' => 'btn btn-main-primary pd-x-20']) !!}
                    </div>
                    {{Form::close()}}




        </div>
    </div>

    <!-- main-content closed -->
@endsection
