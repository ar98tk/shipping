@extends('layouts.master')

@section('title')
    تعديل شاحنة
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الشاحنات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                كود شاحنة ( {{ $truck->name_ar }} )</span>
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
                            <a class="btn btn-primary" href="{{ route('trucks.index') }}">رجوع</a>
                        </div>
                    </div><br>
                    {!! Form::model($truck,['route' => ['trucks.update' , $truck->id], 'method' => 'put']) !!}
                    <div class="row row-sm">

                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-dashboard-map-one">
                                <div class="" style="width: 100%">
                                </div>
                                <div>
                                    {!! Html::decode(Form::label('name_ar', 'الاسم بالعربية : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('name_ar', old('name_ar'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('name_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('name_en', 'الأسم بالأنجليزية : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('name_en' ,old('name_en'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('is_active', 'حالة الخصم : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::select('is_active',  array(1=>"مفعل","0" => "غير مفعل"),old('is_active'), array('placeholder' => 'اختر الحالة',  'class' => 'form-control  nice-select  custom-select', 'tabindex' => '2',)) !!}
                                    @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('max_weight', 'أقصي حمولة : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('max_weight', old('max_weight'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('max_weight')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('area', 'أقصي مسافة : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::text('area' ,old('area'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('area')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('descriptions_ar', 'الوصف بالعربية : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::textarea('descriptions_ar' ,old('descriptions_ar'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('descriptions_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('descriptions_en', 'الوصف بالأنجليزية : <span class="tx-danger">*</span>'))!!}
                                    {!! Form::textarea('descriptions_en' ,old('descriptions_en'),['class'=>'form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('descriptions_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <div>
                                    {!! Html::decode(Form::label('image', 'صورة الشاحنة: <span class="tx-danger">*</span>'))!!}
                                    {!! Form::file('image',['class'=>'form-control form-control"
                                                       data-parsley-class-handler="#lnWrapper' ]) !!}
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                            </div>


                        </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        {!! Form::submit('تعديل', ['class' => 'btn btn-main-primary pd-x-20']) !!}
                    </div>
                    {{Form::close()}}




        </div>
    </div>

    <!-- main-content closed -->
@endsection
