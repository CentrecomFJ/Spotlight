@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create MAAP Email Tracker Entry</h1>
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
                        <h4>Email Tracker Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{ route('admin.emailtracker.store') }}">
                            @csrf
                            <hr>
                            {{-- <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose request type" for="request_type" class="col-md-2 col-form-label text-md-left">Request Type</label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="request_type" data-width="100%" id="request_type">
                                        <option value="" selected> -- select request -- </option>
                                        <option value="refund">Refund</option>
                                        <option value="other_callback">Other/Callback</option>
                                    </select>
                                </div>
                            </div>

                            <hr> --}}

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Date Received" for="date_received" class="col-md-2 col-form-label text-md-left">Date Received:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input id="date_received" type="text" class="form-control" name="date_received" value="{{ date('Y-m-d') ?? '' }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-toggle="tooltip" title="Time Received" for="time_received" class="col-md-2 col-form-label text-md-left">Time Received:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="time_received" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="time_received" data-target="#time_received" value="{{ date('H:i:s') ?? '' }}" required>
                                        <div class="input-group-append" data-target="#time_received" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Email" for="email_address" class="col-md-2 col-form-label text-md-left">Email Address:</label>
                                <div class="col-md-10">
                                    <input id="email_address" type="email" value="" class="form-control" name="email_address" autocomplete="title" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Email Subject" for="email_subject" class="col-md-2 col-form-label text-md-left">Email Subject:</label>

                                <div class="col-md-10">
                                    <input id="email_subject" type="text" value="{{ $refno ?? '' }}" class="form-control" name="email_subject" required autocomplete="title">
                                </div>
                            </div>


                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Order Number" for="order_no" class="col-md-2 col-form-label text-md-left">Order No/Ticket No:</label>

                                <div class="col-md-10">
                                    <input id="order_no" type="text" value="{{ $refno ?? '' }}" class="form-control" name="order_no" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What?" for="email_category" class="col-md-2 col-form-label text-md-left">Email Category: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="email_category" data-width="100%" id="email_category" required>
                                        <option value="" selected> -- select category -- </option>
                                        <option value='Returns'>Returns</option>
                                        <option value='Fraud Checks'>Fraud Checks</option>
                                        <option value='General Inquiry'>General Inquiry</option>
                                        <option value='Label Creating'>Label Creating</option>
                                        <option value='Refunds'>Refunds</option>
                                        <option value='Back Order'>Back Order</option>
                                        <option value='Invoice Request'>Invoice Request</option>
                                        <option value='Sales Order'>Sales Order</option>
                                        <option value='Updating Invalid Address'>Updating Invalid Address</option>
                                        <option value='Uploading Documents'>Uploading Documents</option>
                                        <option value='Discounts'>Discounts</option>
                                        <option value='Requesting Shipping Label'>Requesting Shipping Label</option>
                                        <option value='Chargebacks'>Chargebacks</option>
                                        <option value='Address Checks'>Address Checks</option>
                                        <option value='Warrantees'>Warrantees</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What is the status?" for="status" class="col-md-2 col-form-label text-md-left">Status: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="status" data-width="100%" id="status" required>
                                        <option value="" selected> -- select status -- </option>
                                        <option value='Level 2'>Level 2</option>
                                        <option value='Solved'>Solved</option>
                                        <option value='Open'>Open</option>
                                        <option value='Pending'>Pending</option>
                                        <option value='Closed'>Closed</option>

                                        <option value='Return (Creating Shipping Label)'>Return (Creating Shipping Label)</option>
                                        <option value='Return (Sending Shipping Label) Warehouse'>Return (Sending Shipping Label) Warehouse</option>
                                        <option value='Return (Sending Shipping Label) Customer'>Return (Sending Shipping Label) Customer</option>
                                        <option value='Damaged Item'>Damaged Item</option>
                                        <option value='Sending Replacements'>Sending Replacements</option>
                                        <option value='Gift Cards'>Gift Cards</option>
                                        <option value='Strava'>Strava</option>


                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose escalation" for="escalation" class="col-md-2 col-form-label text-md-left">Escalation: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="escalation" data-width="100%" id="escalation" required>
                                        <option value="" selected> -- select escalation status -- </option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                        <option value='N/A'>N/A</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose call direction" for="msg_via_slack" class="col-md-2 col-form-label text-md-left">Message sent via Slack: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="msg_via_slack" data-width="100%" id="msg_via_slack" required>
                                        <option value="" selected> -- select stat if message has been sent via Slack -- </option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                        <option value='N/a'>N/a</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose Status" for="issues_encountered" class="col-md-2 col-form-label text-md-left">Issue Encountered: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="issues_encountered" data-width="100%" id="issues_encountered">
                                        <option value="" selected> -- select issue -- </option>
                                        {{-- <option value='MAGENTO connectivity issues'>MAGENTO connectivity issues</option>
                                        <option value='Inconsistency in website information/update'>Inconsistency in website information/update</option>
                                        <option value='Repeat callers  - details forwarded but no callback from Spares team'>Repeat callers - details forwarded but no callback from Spares team</option>
                                        <option value='ETA changes in MAGENTO'>ETA changes in MAGENTO</option>
                                        <option value='Shipment/dispatch dates given but not honored.'>Shipment/dispatch dates given but not honored.</option>
                                        <option value='Warehouse delays'>Warehouse delays</option>
                                        <option value='Delay in resolving incomplete orders delivered'>Delay in resolving incomplete orders delivered</option>
                                        <option value='Delay in resolving incorrect orders delivered'>Delay in resolving incorrect orders delivered</option>

                                        <option value='No Issues'>No Issues</option> --}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Agent comments" for="comments" class="col-md-2 col-form-label text-md-left">Agent Remarks:</label>

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
        $("#date_received").datepicker();

        // //Timepicker
        var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });

        //Initialize Select2 Elements
        $('.select2').select2();


    });

</script>
@endsection
