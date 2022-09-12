@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Spotlight Call Tracker Entry</h1>
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h4>Spotlight Call Tracker Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{ route('admin.spotlightcalltracker.store') }}">
                            @csrf
                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Call Date." for="call_date" class="col-md-2 col-form-label text-md-left">Call Date:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" name="call_date" value="{{ date('Y-m-d') ?? '' }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-toggle="tooltip" title="Call Time" for="call_time" class="col-md-2 col-form-label text-md-left">Call Time:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="call-timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="call_time" data-target="#call-timepicker" value="{{ date('h:i:s') ?? '' }}" required>
                                        <div class="input-group-append" data-target="#call-timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="customer_name" class="col-md-2 col-form-label text-md-left">Customer Name: </label>

                                <div class="col-md-10">
                                    <input id="customer_name" type="text" class="form-control" name="customer_name" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="email_address" class="col-md-2 col-form-label text-md-left">Email: </label>

                                <div class="col-md-10">
                                    <input id="email_address" type="email" class="form-control" name="email_address" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="query_type" class="col-md-2 col-form-label text-md-left">Query Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="query_type" data-width="100%" id="query_type">
                                        <option value="" selected> -- select query type -- </option>
                                        <option value='Quotation/Booking'>Quotation/Booking</option>
                                        <option value='Rescheduling'>Rescheduling</option>
                                        <option value='Cancellation'>Cancellation</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="status" class="col-md-2 col-form-label text-md-left">Status: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="status" data-width="100%" id="status">
                                        <option value="" selected> -- select status -- </option>
                                        <option value='New Booking'>New Booking</option>
                                        <option value='Rescheduling'>Rescheduling</option>
                                        <option value='Cancellation'>Cancellation</option>
                                        <option value='Web Leads'>Web Leads</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Agent comments" for="comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control"></textarea>

                                </div>
                            </div>

                            <hr>

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
        $("#date_received").datepicker();

        // //Timepicker
        var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });
        //Initialize Select2 Elements
        $('.select2').select2();

        $('#issues_encountered').on('select2:select', function(e) {
            var data = e.params.data;

            if (data.text == 'Abandoned/Dropped Call') {
                console.log(data.text);
                removeRequiredFields();
            } else {
                console.log("require this bitch");
                addRequiredFields();
            }
        });

        function addRequiredFields() {

            $("#division").prop('required', true);
            $("#customer_name").prop('required', true);
            $("#order_no").prop('required', true);

            $("#call_direction").prop('required', true);
            $("#call_type").prop('required', true);
            $("#phone_num").prop('required', true);

            $("#call_type_def").prop('required', true);
            $("#email_address").prop('required', true);
            $("#email_sent").prop('required', true);

            $("#msg_via_whatsapp").prop('required', true);
            $("#status").prop('required', true);
            $("#escalation").prop('required', true);

            $("#issues_encountered").prop('required', true);
            $("#comments").prop('required', true);

        }

        function removeRequiredFields() {

            $("#division").prop('required', false);
            $("#customer_name").prop('required', false);
            $("#order_no").prop('required', false);

            $("#call_direction").prop('required', false);
            $("#call_type").prop('required', false);
            $("#phone_num").prop('required', false);

            $("#call_type_def").prop('required', false);
            $("#email_address").prop('required', false);
            $("#email_sent").prop('required', false);

            $("#msg_via_whatsapp").prop('required', false);
            $("#status").prop('required', false);
            $("#escalation").prop('required', false);

            $("#issues_encountered").prop('required', false);
            $("#comments").prop('required', false);

        }


    });

</script>
@endsection
