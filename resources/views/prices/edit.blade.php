@extends('layouts.master')

@section('title')
    تعديل التسعيرة
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاسعار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                التسعيرة ( {{ $price->category }} )</span>
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
                            <a class="btn btn-primary" href="{{ route('prices.index') }}">رجوع</a>
                        </div>
                    </div><br>
                    {!! Form::model($price,['route' => ['prices.update' , $price->id], 'method' => 'put']) !!}
                    <div class="row row-sm">

                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-dashboard-map-one">
                                <div class="" style="width: 100%">
                                    <div>
                                        {!! Html::decode(Form::label('category', 'المسافة : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::text('category', old('category'),['class'=>'form-control mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('price', 'السعر : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::text('price', old('price'),['class'=>'form-control mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <br>
                                    <div>
                                        {!! Html::decode(Form::label('trucks_types_id', 'نوع السيارة : <span class="tx-danger">*</span>'))!!}
                                        {!! Form::select('trucks_types_id', App\Models\TrucksTypes::pluck('name_ar', 'id'),old('trucks_types_id'),['class'=>'form-control mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper' ]) !!}
                                        @error('trucks_types_id')<span class="text-danger">{{ $message }}</span>@enderror
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
