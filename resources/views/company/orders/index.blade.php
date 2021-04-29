@extends('layouts.master')
@section('css')



@section('title')
    الطلبات
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    @toastr_css
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">اسم صاحب الطلب</th>
                                <th class="wd-10p border-bottom-0">اسم السائق</th>
                                <th class="wd-8p border-bottom-0">كود الطلب</th>
                                <th class="wd-8p border-bottom-0">سعر الطلب</th>
                                <th class="wd-8p border-bottom-0">طريقة الدفع</th>
                                <th class="wd-10p border-bottom-0">حالة الدفع</th>
                                <th class="wd-20p border-bottom-0">الحالة</th>
                                <th class="wd-15p border-bottom-0">تاريخ الإنشاء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $order->username }}</td>
                                    <td>{{ $order->drivername == null ? 'لم يتم تعيين سائق بعد' : $order->drivername}}</td>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ $order->cost }}</td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->billstatus }}</td>
                                    @if($order->status == 'awaitingPayment')
                                        <td>{!! Form::model($order,['route' => ['orders.status' , $order->id], 'method' => 'put']) !!}
                                        {!! Form::submit('في انتظار الدفع', ['class' => 'btn btn-sm btn-danger pd-x-20']) !!}
                                        {!! Form::close() !!}
                                        </td>

                                    @elseif($order->status == 'cancelledByUser')
                                        <td>{{ $order->status = 'ملغي بواسطة المشترك' }}</td>

                                    @elseif($order->status == 'awaitingDriver')
                                        <td>{{ $order->status = 'بانتظار السائق' }}</td>

                                    @elseif($order->status == 'acceptedByDriver')
                                        <td>{{ $order->status = 'مقبول بواسطة السائق' }}</td>

                                    @elseif($order->status == 'cancelledByDriver')
                                        <td>{{ $order->status = 'ملغي بواسطة السائق' }}</td>

                                    @elseif($order->status == 'arrivedPickUpLocation')
                                        <td>{{ $order->status = 'السائق وصل لموقع التحميل' }}</td>

                                    @elseif($order->status == 'goodsLoading')
                                        <td>{{ $order->status = 'جاري تحميل البضائع' }}</td>

                                    @elseif($order->status == 'startMoving')
                                        <td>{{ $order->status = 'تحرك السائق لوجهته' }}</td>

                                    @elseif($order->status == 'arrivedToDestinationLocation')
                                        <td>{{ $order->status = 'وصل السائق لوجهته' }}</td>

                                    @elseif($order->status == 'finishedTripByDriver')
                                        <td>{{ $order->status = 'السائق انهي الرحلة' }}</td>

                                    @elseif($order->status == 'fininshedTripByUser')
                                        <td>{{ $order->status = 'المشترك انهي الرحلة' }}</td>

                                    @elseif($order->status == 'closed')
                                        <td>{{ $order->status = 'مغلقة' }}</td>

                                    @elseif($order->status == 'acceptedByCompany')
                                        <td>{{ $order->status = 'مقبولة بواسطة الشركة' }}</td>
                                    @endif

                                    <td>{{ $order->created_at }}</td>

                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    @endsection
    @section('js')
        <!-- Internal Data tables -->
            <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
            <!--Internal  Datatable js -->
            <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
            <!--Internal  Notify js -->
            <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
            <!-- Internal Modal js-->
            <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
            @toastr_js
            @toastr_render
            <script>
                $('#modaldemo9').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name_ar = button.data('name_ar')
                    var modal = $(this)

                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name_ar').val(name_ar);
                })
            </script>



@endsection
