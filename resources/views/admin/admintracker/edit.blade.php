@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Admin Tracker Record</h1>
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
                        <strong>{{ trans('global.edit') }} Admin Tracker Record # {{ $admintracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.admintracker.update', [$admintracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$admintracker->id ?? null }}">

                            <hr>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Call Date." for="entry_date" class="col-md-2 col-form-label text-md-left">Entry Date:</label>

                                <div class="col-md-6">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" name="entry_date" value="{{ $admintracker->entry_date }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Call Time" for="entry_date" class="col-md-2 col-form-label text-md-left">Entry Time:</label>

                                <div class="col-md-6">

                                    <div class="input-group date" id="entry-timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="entry_time" data-target="#entry-timepicker" value="{{ $admintracker->entry_time }}" required>
                                        <div class="input-group-append" data-target="#call-timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose Admin Type" for="type" class="col-md-2 col-form-label text-md-left">Admin Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="type" data-width="100%" id="type">
                                        <option value="" selected> -- select admin type -- </option>
                                        <option {{ $admintracker->type == "SKU Refund" ? "selected" : ""}} value='SKU Refund'>SKU Refund</option>
                                        <option {{ $admintracker->type == "Approved Refund" ? "selected" : ""}} value='Approved Refund'>Approved Refund</option>
                                        <option {{ $admintracker->type == "NLA" ? "selected" : ""}} value='NLA'>NLA</option>
                                        <option {{ $admintracker->type == "Partial Refund" ? "selected" : ""}} value='Partial Refund'>Partial Refund</option>

                                        <option {{ $admintracker->type == "Shipping Refund" ? "selected" : ""}} value='Shipping Refund'>Shipping Refund</option>
                                        <option {{ $admintracker->type == "Refund request" ? "selected" : ""}} value='Refund request'>Refund request</option>

                                        <option {{ $admintracker->type == "Podium" ? "selected" : ""}} value='Podium'>Podium</option>

                                        <option {{ $admintracker->type == "Voicemails" ? "selected" : ""}} value='Voicemails'>Voicemails</option>

                                        <option {{ $admintracker->type == "Partial Shipment" ? "selected" : ""}} value='Partial Shipment'>Partial Shipment</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Please type customer name" for="customer_name" class="col-md-2 col-form-label text-md-left">Customer Name: </label>

                                <div class="col-md-10">
                                    <input id="customer_name" type="text" class="form-control" name="customer_name" autocomplete="title" value="{{ $admintracker->customer_name }}">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Email Address" for="email_address" class="col-md-2 col-form-label text-md-left">Email Address: </label>

                                <div class="col-md-10">
                                    <input id="email_address" type="email" class="form-control" name="email_address" autocomplete="title" value="{{ $admintracker->email_address }}">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Please type order number" for="order_no" class="col-md-2 col-form-label text-md-left">Order Number: </label>

                                <div class="col-md-10">
                                    <input id="order_no" type="text" class="form-control" name="order_no" autocomplete="title" value="{{ $admintracker->order_no }}">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Please type amount refunded" for="amt_refunded" class="col-md-2 col-form-label text-md-left">Amount Refunded: </label>

                                <div class="col-md-10">
                                    <input id="amt_refunded" type="text" class="form-control" name="amt_refunded" autocomplete="title" value="{{ $admintracker->amt_refunded }}">
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the status?" for="stat" class="col-md-2 col-form-label text-md-left">Status: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="stat" data-width="100%" id="stat">
                                        <option value="" selected> -- select status -- </option>
                                        <option {{ $admintracker->stat == "Pending" ? "selected" : ""}} value='Pending'>Pending</option>
                                        <option {{ $admintracker->stat == "Processed" ? "selected" : ""}} value='Processed'>Processed</option>

                                        <option {{ $admintracker->stat == "Podium Reviews" ? "selected" : ""}} value='Podium Reviews'>Podium Reviews</option>
                                        <option {{ $admintracker->stat == "Podium Follow-up" ? "selected" : ""}} value='Podium Follow-up'>Podium Follow-up</option>

                                        <option {{ $admintracker->stat == "Refunded Offline" ? "selected" : ""}} value='Refunded Offline'>Refunded Offline</option>

                                        <option {{ $admintracker->stat == "Blank Voicemail" ? "selected" : ""}} value='Blank Voicemail'>Blank Voicemail</option>

                                        <option {{ $admintracker->stat == "Partial Order" ? "selected" : ""}} value='Partial Order'>Partial Order</option>
                                        <option {{ $admintracker->stat == "Complete Order" ? "selected" : ""}} value='Complete Order'>Complete Order</option>
                                        <option {{ $admintracker->stat == "Not Shippable" ? "selected" : ""}} value='Not Shippable'>Not Shippable</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Please type quantity" for="quantity" class="col-md-2 col-form-label text-md-left">Quantity Refunded: </label>

                                <div class="col-md-10">
                                    <input id="quantity" type="text" class="form-control" name="quantity" autocomplete="title" value="{{ $admintracker->quantity }}">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Please type amount" for="amount" class="col-md-2 col-form-label text-md-left">Amount Pending: </label>

                                <div class="col-md-10">
                                    <input id="amount" type="text" class="form-control" name="amount" autocomplete="title" value="{{ $admintracker->amount }}">
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Was the Credit Memo Emailed?" for="credit_memo_email" class="col-md-2 col-form-label text-md-left">Credit Memo Emailed: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="credit_memo_email" data-width="100%" id="credit_memo_email">
                                        <option value="" selected> -- select yes/no -- </option>
                                        <option {{ $admintracker->credit_memo_email == "Yes" ? "selected" : ""}} value='Yes'>Yes</option>
                                        <option {{ $admintracker->credit_memo_email == "No" ? "selected" : ""}} value='No'>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Agent comments" for="comments" class="col-md-2 col-form-label text-md-left">Agent Remarks:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control">{{ $admintracker->comments }}</textarea>

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
        $("#entry_date").datepicker();

        // //Timepicker

        var startTime = $('#entry-timepicker').datetimepicker({
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
