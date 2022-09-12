@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit MAAP Email Record</h1>
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
                        <strong>{{ trans('global.edit') }} MAAP Email Record # {{ $emailtracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.emailtracker.update', [$emailtracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$emailtracker->id ?? null }}">


                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Date Received" for="date_received" class="col-md-2 col-form-label text-md-left">Date Received:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input id="date_received" type="text" class="form-control" name="date_received" value="{{ $emailtracker->date_received }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-toggle="tooltip" title="Time Received" for="time_received" class="col-md-2 col-form-label text-md-left">Time Received:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="time_received" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="time_received" data-target="#time_received" value="{{ $emailtracker->time_received }}" required>
                                        <div class="input-group-append" data-target="#time_received" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Email" for="email_address" class="col-md-2 col-form-label text-md-left">Email Address:</label>
                                <div class="col-md-10">
                                    <input id="email_address" type="email" value="{{ $emailtracker->email_address }}" class="form-control" name="email_address" autocomplete="title" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Email Subject" for="email_subject" class="col-md-2 col-form-label text-md-left">Email Subject:</label>

                                <div class="col-md-10">
                                    <input id="email_subject" type="text" class="form-control" name="email_subject" required autocomplete="title" value="{{ $emailtracker->email_subject }}">
                                </div>
                            </div>


                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Order Number" for="order_no" class="col-md-2 col-form-label text-md-left">Order No:</label>

                                <div class="col-md-10">
                                    <input id="order_no" type="text" class="form-control" value="{{ $emailtracker->order_no }}" name="order_no" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What?" for="email_category" class="col-md-2 col-form-label text-md-left">Email Category: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="email_category" data-width="100%" id="email_category" required>
                                        <option value="" selected> -- select category -- </option>
                                        <option {{ $emailtracker->email_category == "Returns" ? "selected" : ""}} value='Returns'>Returns</option>
                                        <option {{ $emailtracker->email_category == "Fraud Checks" ? "selected" : ""}} value='Fraud Checks'>Fraud Checks</option>
                                        <option {{ $emailtracker->email_category == "General Inquiry" ? "selected" : ""}} value='General Inquiry'>General Inquiry</option>
                                        <option {{ $emailtracker->email_category == "Label Creating" ? "selected" : ""}} value='Label Creating'>Label Creating</option>
                                        <option {{ $emailtracker->email_category == "Refunds" ? "selected" : ""}} value='Refunds'>Refunds</option>
                                        <option {{ $emailtracker->email_category == "Back Order" ? "selected" : ""}} value='Back Order'>Back Order</option>
                                        <option {{ $emailtracker->email_category == "Invoice Request" ? "selected" : ""}} value='Invoice Request'>Invoice Request</option>
                                        <option {{ $emailtracker->email_category == "Sales Order" ? "selected" : ""}} value='Sales Order'>Sales Order</option>
                                        <option {{ $emailtracker->email_category == "Updating Invalid Address" ? "selected" : ""}} value='Updating Invalid Address'>Updating Invalid Address</option>
                                        <option {{ $emailtracker->email_category == "Uploading Documents" ? "selected" : ""}} value='Uploading Documents'>Uploading Documents</option>
                                        <option {{ $emailtracker->email_category == "Discounts" ? "selected" : ""}} value='Discounts'>Discounts</option>
                                        <option {{ $emailtracker->email_category == "Requesting Shipping Label" ? "selected" : ""}} value='Requesting Shipping Label'>Requesting Shipping Label</option>
                                        <option {{ $emailtracker->email_category == "Chargebacks" ? "selected" : ""}} value='Chargebacks'>Chargebacks</option>
                                        <option {{ $emailtracker->email_category == "Address Checks" ? "selected" : ""}} value='Address Checks'>Address Checks</option>
                                        <option {{ $emailtracker->email_category == "Warrantees" ? "selected" : ""}} value='Warrantees'>Warrantees</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What is the status?" for="status" class="col-md-2 col-form-label text-md-left">Status: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="status" data-width="100%" id="status" required>
                                        <option value="" selected> -- select source -- </option>
                                        <option {{ $emailtracker->status == "Level 2" ? "selected" : ""}} value='Level 2'>Level 2</option>
                                        <option {{ $emailtracker->status == "Solved" ? "selected" : ""}} value='Solved'>Solved</option>
                                        <option {{ $emailtracker->status == "Open" ? "selected" : ""}} value='Open'>Open</option>
                                        <option {{ $emailtracker->status == "Pending" ? "selected" : ""}} value='Pending'>Pending</option>
                                        <option {{ $emailtracker->status == "Closed" ? "selected" : ""}} value='Closed'>Closed</option>

                                        <option {{ $emailtracker->status == "Return (Creating Shipping Label)" ? "selected" : ""}} value='Return (Creating Shipping Label)'>Return (Creating Shipping Label)</option>
                                        <option {{ $emailtracker->status == "Return (Sending Shipping Label) Warehouse" ? "selected" : ""}} value='Return (Sending Shipping Label) Warehouse'>Return (Sending Shipping Label) Warehouse</option>
                                        <option {{ $emailtracker->status == "Return (Sending Shipping Label) Customer" ? "selected" : ""}} value='Return (Sending Shipping Label) Customer'>Return (Sending Shipping Label) Customer</option>
                                        <option {{ $emailtracker->status == "Damaged Item" ? "selected" : ""}} value='Damaged Item'>Damaged Item</option>
                                        <option {{ $emailtracker->status == "Sending Replacements" ? "selected" : ""}} value='Sending Replacements'>Sending Replacements</option>
                                        <option {{ $emailtracker->status == "Gift Cards" ? "selected" : ""}} value='Gift Cards'>Gift Cards</option>
                                        <option {{ $emailtracker->status == "Strava" ? "selected" : ""}} value='Strava'>Strava</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose escalation" for="escalation" class="col-md-2 col-form-label text-md-left">Escalation: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="escalation" data-width="100%" id="escalation" required>
                                        <option value="" selected> -- select escalation status -- </option>
                                        <option {{ $emailtracker->escalation == "Yes" ? "selected" : ""}} value='Yes'>Yes</option>
                                        <option {{ $emailtracker->escalation == "No" ? "selected" : ""}} value='No'>No</option>
                                        <option {{ $emailtracker->escalation == "N/A" ? "selected" : ""}} value='N/A'>N/A</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose call direction" for="msg_via_slack" class="col-md-2 col-form-label text-md-left">Message sent via Whatsapp: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="msg_via_slack" data-width="100%" id="msg_via_slack" required>
                                        <option value="" selected> -- select stat if message has been sent via Slack -- </option>
                                        <option {{ $emailtracker->msg_via_slack == "Yes" ? "selected" : ""}} value='Yes'>Yes</option>
                                        <option {{ $emailtracker->msg_via_slack == "No" ? "selected" : ""}} value='No'>No</option>
                                        <option {{ $emailtracker->msg_via_slack == "N/A" ? "selected" : ""}} value='N/A'>N/A</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose Status" for="issues_encountered" class="col-md-2 col-form-label text-md-left">Issue Encountered: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="issues_encountered" data-width="100%" id="issues_encountered">
                                        <option value="" selected> -- select issue -- </option>
                                        {{-- <option {{ $emailtracker->issues_encountered == "MAGENTO connectivity issues" ? "selected" : ""}} value='MAGENTO connectivity issues'>MAGENTO connectivity issues</option>
                                        <option {{ $emailtracker->issues_encountered == "Inconsistency in website information/update" ? "selected" : ""}} value='Inconsistency in website information/update'>Inconsistency in website information/update</option>
                                        <option {{ $emailtracker->issues_encountered == "Repeat callers  - details forwarded but no callback from Spares team" ? "selected" : ""}} value='Repeat callers  - details forwarded but no callback from Spares team'>Repeat callers - details forwarded but no callback from Spares team</option>
                                        <option {{ $emailtracker->issues_encountered == "ETA changes in MAGENTO" ? "selected" : ""}} value='ETA changes in MAGENTO'>ETA changes in MAGENTO</option>
                                        <option {{ $emailtracker->issues_encountered == "Shipment/dispatch dates given but not honored." ? "selected" : ""}} value='Shipment/dispatch dates given but not honored.'>Shipment/dispatch dates given but not honored.</option>
                                        <option {{ $emailtracker->issues_encountered == "Warehouse delays" ? "selected" : ""}} value='Warehouse delays'>Warehouse delays</option>
                                        <option {{ $emailtracker->issues_encountered == "Delay in resolving incomplete orders delivered" ? "selected" : ""}} value='Delay in resolving incomplete orders delivered'>Delay in resolving incomplete orders delivered</option>
                                        <option {{ $emailtracker->issues_encountered == "Delay in resolving incorrect orders delivered" ? "selected" : ""}} value='Delay in resolving incorrect orders delivered'>Delay in resolving incorrect orders delivered</option>

                                        <option {{ $emailtracker->issues_encountered == "No Issues" ? "selected" : ""}} value='No Issues'>No Issues</option> --}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Agent comments" for="comments" class="col-md-2 col-form-label text-md-left">Agent Remarks:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control">{{ $emailtracker->comments }}</textarea>

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
