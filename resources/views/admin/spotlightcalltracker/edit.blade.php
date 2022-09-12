@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Spotlight Call Record</h1>
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
                        <strong>{{ trans('global.edit') }} Spotlight Call Record # {{ $spotlightcalltracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.spotlightcalltracker.update', [$spotlightcalltracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$spotlightcalltracker->id ?? null }}">

                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Call Date." for="call_date" class="col-md-2 col-form-label text-md-left">Call Date:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" name="call_date" value="{{ $spotlightcalltracker->call_date ?? date('Y-m-d') ?? '' }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-toggle="tooltip" title="Call Time" for="call_time" class="col-md-2 col-form-label text-md-left">Call Time:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="call-timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="call_time" data-target="#call-timepicker" value="{{ $spotlightcalltracker->call_time ?? date('h:i:s') ?? '' }}" required>
                                        <div class="input-group-append" data-target="#call-timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="customer_name" class="col-md-2 col-form-label text-md-left">Customer Name: </label>

                                <div class="col-md-10">
                                    <input id="customer_name" type="text" class="form-control" name="customer_name" required autocomplete="title" value="{{ $spotlightcalltracker->customer_name ?? null }}">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="email_address" class="col-md-2 col-form-label text-md-left">Email: </label>

                                <div class="col-md-10">
                                    <input id="email_address" type="email" class="form-control" name="email_address" required autocomplete="title" value="{{ $spotlightcalltracker->email_address ?? null }}">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="query_type" class="col-md-2 col-form-label text-md-left">Query Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="query_type" data-width="100%" id="query_type">
                                        <option {{ $spotlightcalltracker->query_type == "Quotation/Booking" ? "selected" : ""}} value='Quotation/Booking'>Quotation/Booking</option>
                                        <option {{ $spotlightcalltracker->query_type == "Rescheduling" ? "selected" : ""}} value='Rescheduling'>Rescheduling</option>
                                        <option {{ $spotlightcalltracker->query_type == "Cancellation" ? "selected" : ""}} value='Cancellation'>Cancellation</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="status" class="col-md-2 col-form-label text-md-left">Status: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="status" data-width="100%" id="status">
                                        <option value="" selected> -- select status -- </option>
                                        <option {{ $spotlightcalltracker->status == "New Booking" ? "selected" : ""}} value='New Booking'>New Booking</option>
                                        <option {{ $spotlightcalltracker->status == "Rescheduling" ? "selected" : ""}} value='Rescheduling'>Rescheduling</option>
                                        <option {{ $spotlightcalltracker->status == "Cancellation" ? "selected" : ""}} value='Cancellation'>Cancellation</option>
                                        <option {{ $spotlightcalltracker->status == "Web Leads" ? "selected" : ""}} value='Web Leads'>Web Leads</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Agent comments" for="comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control">{{ $spotlightcalltracker->comments }}</textarea>

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
