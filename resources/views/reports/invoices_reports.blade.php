@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@section('title')
    تقرير الفواتير -
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير
                الادويه</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
{{--
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
@endif --}}

<!-- row -->
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">


            <div class="card-header pb-0">

                <form action="{{ url('report') }}" method="POST" role="search" autocomplete="off">
                    @csrf



                    <div class="col-lg-3">
                        <label class="rdiobox">
                            <input checked name="rdio" type="radio" value="1" id="type_div"> <span>
                                اخفاء </span></label>
                    </div>


                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                        <label class="rdiobox"><input name="rdio" value="2" type="radio"><span>
                                عمل تقرير للادويه
                            </span></label>
                    </div><br><br>

                    <div class="row">


                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="invoice_number">
                            <p class="mg-b-10">البحث باسم الدواء</p>
                            <input type="text" class="form-control" id="invoice_number"  name="product_name" required  >

                        </div><!-- col-4 -->

                    </div><br>

                    <div class="row">
                        <div class="col-sm-1 col-md-1">
                            <button class="btn btn-primary btn-block">بحث</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (isset($details))
                        <table id="example" class="table key-buttons text-md-nowrap" style=" text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0"># </th>
                                    <th class="border-bottom-0">اسم دواء</th>
                                    <th class="border-bottom-0">اسم التجاري للدواء </th>
                                    <th class="border-bottom-0">سعر الشراء</th>
                                    <th class="border-bottom-0"> سعر البيع</th>
                                    <th class="border-bottom-0"> مكانه</th>
                                    <th class="border-bottom-0"> الصنف</th>
                                    <th class="border-bottom-0"> الكميه</th>
                                    <th class="border-bottom-0"> الوحده</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- 'Product_name',
                                'trade_Name',
                                'description',
                                'purchasing_price',
                                'selling_price',
                                'mount',
                                'notification_mount',
                                'unite_id',
                                'section_id', --}}

                                @foreach ($details as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->Product_name }} </td>
                                        <td>{{ $product->trade_Name }}</td>
                                        <td>{{ $product->purchasing_price }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->place }}</td>
                                        <td>
                                            {{ DB::table('sections')->where('id', $product->section_id)->first()->section_name }}
                                        </td>
                                        <td>{{ $product->mount }}</td>
                                        <td>  {{ DB::table('unites')->where('id', $product->unite_id )->first()->name_unite }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
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
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
</script>


<script>
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            if ($(this).attr("value") == "1") {
                $("#invoice_number").hide();
                $("#type").show();
                $("#start_at").show();
                $("#end_at").show();
            } else {
                $("#invoice_number").show();

                $("#type").hide();
                $("#start_at").hide();
                $("#end_at").hide();
            }
        });
    });
</script>

@endsection
