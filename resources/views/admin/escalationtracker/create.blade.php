@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create AMS Escalation Tracker Entry</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create</li>
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
                    <div class="card-header">
                        <h4>Escalation Tracker Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{ route('admin.escalationtracker.store') }}">
                            @csrf
                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Date Received" for="esc_date" class="col-md-2 col-form-label text-md-left">Date:</label>

                                <div class="col-md-10">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input id="esc_date" type="text" class="form-control" name="esc_date" value="{{ date('Y-m-d') ?? '' }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Order number" for="order_no" class="col-md-2 col-form-label text-md-left">Order Number:</label>
                                <div class="col-md-10">
                                    <input id="order_no" type="text" value="" class="form-control" name="order_no" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="customer_name" class="col-md-2 col-form-label text-md-left">Customer Name:</label>

                                <div class="col-md-10">
                                    <input id="customer_name" type="text" value="" class="form-control" name="customer_name" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What is the escalation type?" for="esc_type" class="col-md-2 col-form-label text-md-left">Escalation Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="esc_type" data-width="100%" id="esc_type">
                                        <option value="" selected> -- select type -- </option>
                                        <option value='Refund'>Refund</option>
                                        <option value='Order Chase'>Order Chase</option>
                                        <option value='Incorrect Items Delivered'>Incorrect Items Delivered</option>
                                        <option value='Missing Items'>Missing Items</option>
                                        <option value='Pickup'>Pickup</option>
                                        <option value='Partial Shipment'>Partial Shipment</option>


                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Any updates or comments? " for="comments" class="col-md-2 col-form-label text-md-left">Update/Comments:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control"></textarea>

                                </div>
                            </div>


                            <div class="form-group row mb-0 save">

                                <div class="col-md-6 ">
                                    <button type="submit" id="sales-tracker-submit" class="btn btn-primary pull-right">
                                        Save
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
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $("#esc_date").datepicker();

        // //Timepicker
        /*
        var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });
        */

        //Initialize Select2 Elements
        $('.select2').select2();


    });

</script>
@endsection
