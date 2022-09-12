@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit AMS Escalation Record</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header" style="color:black;background:#d4d13d;">
                        <strong>{{ trans('global.edit') }} AMS Escalation Record # {{ $escalationtracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.escalationtracker.update', [$escalationtracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$escalationtracker->id ?? null }}">

                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Date Received" for="esc_date" class="col-md-2 col-form-label text-md-left">Date:</label>

                                <div class="col-md-10">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input id="esc_date" type="text" class="form-control" name="esc_date" value="{{ $escalationtracker->esc_date }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Order number" for="order_no" class="col-md-2 col-form-label text-md-left">Order Number:</label>
                                <div class="col-md-10">
                                    <input id="order_no" type="text" class="form-control" name="order_no" value="{{ $escalationtracker->order_no }}" autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="customer_name" class="col-md-2 col-form-label text-md-left">Customer Name:</label>

                                <div class="col-md-10">
                                    <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ $escalationtracker->customer_name }}" autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What is the escalation type?" for="esc_type" class="col-md-2 col-form-label text-md-left">Escalation Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="esc_type" data-width="100%" id="esc_type">
                                        <option value="" selected> -- select type -- </option>
                                        <option {{ $escalationtracker->esc_type == "Refund" ? "selected" : ""}} value='Refund'>Refund</option>
                                        <option {{ $escalationtracker->esc_type == "Order Chase" ? "selected" : ""}} value='Order Chase'>Order Chase</option>
                                        <option {{ $escalationtracker->esc_type == "Incorrect Items Delivered" ? "selected" : ""}} value='Incorrect Items Delivered'>Incorrect Items Delivered</option>
                                        <option {{ $escalationtracker->esc_type == "Missing Items" ? "selected" : ""}} value='Missing Items'>Missing Items</option>
                                        <option {{ $escalationtracker->esc_type == "Pickup" ? "selected" : ""}} value='Pickup'>Pickup</option>
                                        <option {{ $escalationtracker->esc_type == "Partial Shipment" ? "selected" : ""}} value='Partial Shipment'>Partial Shipment</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Any updates or comments? " for="comments" class="col-md-2 col-form-label text-md-left">Update/Comments:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control">{{ $escalationtracker->comments }}</textarea>

                                </div>
                            </div>
                            <hr>

                            <div class="form-group row mb-0 save">

                                <div class="col-md-6 ">
                                    <button type="submit" id="sales-tracker-submit" class="btn btn-primary pull-right">
                                        Update
                                    </button>
                                    {{-- <input id="sales-tracker-submit" class="btn btn-primary pull-right" type="submit"  onclick="this.disabled=true; this.value='Saving, please wait...';this.form.submit();" value="Save" /> --}}
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $("#date_received").datepicker();

        // //Timepicker
        var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });

        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

    });

</script>
@endsection
