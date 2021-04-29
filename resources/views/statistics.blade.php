@extends('layouts.master')
@section('title')
 الاحصائيات
@stop

@section('content')
    <!-- row -->
    <br><br>
    <div class="row row--lg">
        <div class="col-xl-4 col-lg-6 col-lg-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-secondary">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">عدد المدراء</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white justify-content-center">
                                    {{ \App\Models\Admin::where('type', '=', 'admin')->count() }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-lg-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-pink-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">عدد الشركات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white justify-content-center">
                                    {{ \App\Models\Admin::where('type', '=', 'company')->count() }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-lg-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">عدد السائقين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white justify-content-center">
                                    {{ \App\Models\Driver::count() }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-lg-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-teal">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">عدد المشتركين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white justify-content-center">
                                    {{ \App\Models\User::count() }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white"> الكوبونات الفعالة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\DiscountCode::where('is_active','=',1)->count() }}

                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">أنواع السيارات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\TrucksTypes::count() }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white"> أنوع البضائع</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\GoodsTypes::count() }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-secondary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">إجمالي المبالغ المدفوعة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\Financial::sum('paid_money') }}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">رسائل السائقين المفتوحة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\Contact::where('status','=','open')
                                                        ->where('drivers_id','!=',null)->count()}}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-dark">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">رسائل المشتركين المفتوحة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\Contact::where('status','=','open')
                                                        ->where('users_id','!=',null)->count()}}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">طلبات دفع الفواتير المفتوحة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\OfflinePayment::where('admin_approve','=',null)->count()}}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-20 text-white">طلبات دفع الفواتير المقبولة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-30 font-weight-bold mb-1 text-white">
                                    {{ \App\Models\OfflinePayment::where('admin_approve','=',1)->count()}}
                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
