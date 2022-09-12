@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Rex Record</h1>
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
                        <strong>{{ trans('global.edit') }} Rex Record # {{ $rextracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.rextracker.update', [$rextracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$rextracker->id ?? null }}">

                            <hr>
                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose request type" for="request_type" class="col-md-2 col-form-label text-md-left">Request Type</label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="request_type" data-width="100%" id="request_type">

                                        <option {{ $rextracker->request_type=="refund" ? 'selected' : '' }} value="refund">Refund</option>
                                        <option {{ $rextracker->request_type=="other_callback" ? 'selected' : '' }} value="other_callback">Other/Callback</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Call Date." for="entry_date" class="col-md-2 col-form-label text-md-left">Date:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" name="entry_date" value="{{ $rextracker->entry_date ?? date('Y-m-d') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Please refer to reference number" for="ref_no" class="col-md-2 col-form-label text-md-left">Ref No:</label>

                                <div class="col-md-4">
                                    <input id="ref_no" type="text" value="{{ $rextracker->ref_no ?? '' }}" class="form-control" name="ref_no" required autocomplete="title" readonly>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Time" for="entry_time" class="col-md-2 col-form-label text-md-left">Time:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="entry-timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="entry_time" data-target="#entry-timepicker" value="{{ $rextracker->entry_time ?? date('Gi') }}">
                                        <div class="input-group-append" data-target="#entry-timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in First name" for="fname" class="col-md-2 col-form-label text-md-left">First name:</label>
                                <div class="col-md-4">
                                    <input id="fname" type="text" value="{{ $rextracker->fname ?? '' }}" class="form-control" name="fname" autocomplete="title" autofocus required>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Last name" for="lname" class="col-md-2 col-form-label text-md-left">Last name:</label>
                                <div class="col-md-4">
                                    <input id="lname" type="text" value="{{ $rextracker->lname ?? '' }}" class="form-control" name="lname" autocomplete="title" autofocus required>
                                </div>

                            </div>

                            <div class="form-group row s1a">

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Primary Phone Number" for="primary_phone" class="col-md-2 col-form-label text-md-left">Primary Phone:</label>
                                <div class="col-md-4">
                                    <input id="primary_phone" type="text" value="{{ $rextracker->primary_phone ?? '' }}" class="form-control" name="primary_phone" autocomplete="title" autofocus required>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Secondary Phone Number" for="secondary_phone" class="col-md-2 col-form-label text-md-left">Secondary Phone:</label>
                                <div class="col-md-4">
                                    <input id="secondary_phone" type="text" value="{{ $rextracker->secondary_phone ?? '' }}" class="form-control" name="secondary_phone" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Email" for="email_address" class="col-md-2 col-form-label text-md-left">Email:</label>
                                <div class="col-md-4">
                                    <input id="email_address" type="email" value="{{ $rextracker->email_address ?? '' }}" class="form-control" name="email_address" autocomplete="title" autofocus>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row s1a">
                                <label id="lbl-ta-booking" data-placement="bottom" data-toggle="tooltip" title="Is it a Travel Agent Booking?" for="ta_booking" class="col-md-3 col-form-label text-md-left">Travel Agent Booking</label>
                                <div id="select-ta-booking" class="col-md-3">
                                    <select class="form-control select2" name="ta_booking" id="ta_booking">
                                        <option {{ $rextracker->ta_booking=="Yes"? "selected" : "" }} value="Yes">Yes</option>
                                        <option {{ $rextracker->ta_booking=="No"? "selected" : "" }} value="No">No</option>
                                    </select>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Booking reference" for="booking_ref" class="col-md-2 col-form-label text-md-left">Booking Reference</label>
                                <div class="col-md-4">
                                    <input id="booking_ref" type="text" value="{{ $rextracker->booking_ref ?? "" }}" class="form-control" name="booking_ref" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in passenger First name" for="pass_fname" class="col-md-2 col-form-label text-md-left">Passenger First name</label>
                                <div class="col-md-4">
                                    <input id="pass_fname" type="text" value="{{ $rextracker->pass_fname ?? "" }}" class="form-control" name="pass_fname" autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in passenger Last name" for="pass_lname" class="col-md-2 col-form-label text-md-left">Passenger Last name</label>
                                <div class="col-md-4">
                                    <input id="pass_lname" type="text" value="{{ $rextracker->pass_lname ?? ""  }}" class="form-control" name="pass_lname" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in ticket numbers" for="ticket_num" class="col-md-2 col-form-label text-md-left">Ticket Numbers</label>
                                <div class="col-md-4">
                                    <input id="ticket_num" type="text" value="{{ $rextracker->ticket_num ?? "" }}" class="form-control" name="ticket_num" autocomplete="title" autofocus>
                                </div>
                                {{--
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in passenger Last name" for="pass_lname" class="col-md-2 col-form-label text-md-left">Passenger Last name:</label>
                                <div class="col-md-4">
                                    <input id="pass_fname" type="text" value="" class="form-control" name="pass_lname" autocomplete="title" autofocus>
                                </div> --}}
                            </div>

                            <div class="form-group row s1a">
                                <label id="lbl-whole-booking" data-placement="bottom" data-toggle="tooltip" title="Whole/Partial Booking?" for="whole_booking" class="col-md-3 col-form-label text-md-left">Whole/Partial Booking</label>
                                <div id="select-whole-booking" class="col-md-3">
                                    <select class="form-control select2" name="whole_booking" id="whole_booking">
                                        <option {{ $rextracker->whole_booking=="Whole_Booking"? "selected" : "" }} value="Whole_Booking">Whole_Booking</option>
                                        <option {{ $rextracker->whole_booking=="Partial_Refund"? "selected" : "" }} value="Partial_Refund">Partial_Refund</option>
                                        <option {{ $rextracker->whole_booking=="Full_Refund_of_Ticket"? "selected" : "" }} value="Full_Refund_of_Ticket">Full_Refund_of_Ticket</option>
                                        <option {{ $rextracker->whole_booking=="Full_Refund_of_Ticket"? "selected" : "" }} value="Full_Refund_of_Tickets">Full_Refund_of_Tickets</option>
                                        <option {{ $rextracker->whole_booking=="Full_Refund"? "selected" : "" }} value="Full_Refund">Full_Refund</option>
                                        <option {{ $rextracker->whole_booking=="Cancel_Segment"? "selected" : "" }} value="Cancel_Segment">Cancel_Segment</option>
                                        <option {{ $rextracker->whole_booking=="Other"? "selected" : "" }} value="Other">Other</option>
                                    </select>
                                </div>

                                {{-- <label data-placement="bottom" data-toggle="tooltip" title="Type in Booking reference" for="other_booking" class="col-md-2 col-form-label text-md-left">Other:</label> --}}
                                <div id="other-booking-container" class="col-md-4" @if($rextracker->whole_booking !="Other") style='display:none;' @endif>
                                    <input id="other_booking" type="text" value="{{ $rextracker->other_booking ?? "" }}" class="form-control" name="other_booking" autocomplete="title" autofocus placeholder="Other booking?">
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Is your flight within the next 24hrs?" for="flight_24hrs" class="col-md-3 col-form-label text-md-left">Urgent/ Travel within 24 hours?</label>
                                <div class="col-md-3">
                                    <select class="form-control select2" name="flight_24hrs" id="flight_24hrs">
                                        <option {{ $rextracker->flight_24hrs=="Yes"? "selected" : "" }} value="Yes">Yes</option>
                                        <option {{ $rextracker->flight_24hrs=="No"? "selected" : "" }} value="No">No</option>

                                    </select>

                                </div>

                                <label id="lbl-credit-req" data-toggle="tooltip" title="Credit Request?" for="credit_req" class="col-md-3 col-form-label text-md-left">Credit Request?</label>
                                <div id="select-credit-req" class="col-md-3">
                                    <select class="form-control select2" name="credit_req" data-width="100%" id="credit_req">

                                        <option {{ $rextracker->credit_req=="Yes"? "selected" : "" }} value="Yes">Yes</option>
                                        <option {{ $rextracker->credit_req=="Yes"? "selected" : "" }} value="No">No</option>

                                    </select>

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row s2">
                                <label id="lbl-disposition" data-toggle="tooltip" title="Call Disposition?" for="disposition" class="col-md-3 col-form-label text-md-left">Call Disposition</label>
                                <div id="select-disposition" class="col-md-4">
                                    <select class="form-control select2" name="disposition" data-width="100%" id="disposition">

                                        <option {{ $rextracker->disposition=="Refund_Follow_Up"? "selected" : "" }} value="Refund_Follow_Up">Refund_Follow_Up</option>
                                        <option {{ $rextracker->disposition=="Escalation"? "selected" : "" }} value="Escalation">Escalation</option>
                                        <option {{ $rextracker->disposition=="Rebooking"? "selected" : "" }} value="Rebooking">Rebooking</option>
                                        <option {{ $rextracker->disposition=="New_Booking"? "selected" : "" }} value="New_Booking">New_Booking</option>
                                        <option {{ $rextracker->disposition=="Purchasing_Ancillary_Services"? "selected" : "" }} value="Purchasing_Ancillary_Services">Purchasing_Ancillary_Services</option>
                                        <option {{ $rextracker->disposition=="Schedule_Change"? "selected" : "" }} value="Schedule_Change">Schedule_Change</option>

                                        <option {{ $rextracker->disposition=='Categories for Other Call-back Requests'?'selected' : '' }} value='Categories for Other Call-back Requests'>Categories for Other Call-back Requests</option>
                                        <option {{ $rextracker->disposition=='Baggage Inquiry'?'selected' : '' }} value='Baggage Inquiry'>Baggage Inquiry</option>
                                        <option {{ $rextracker->disposition=='Booking Confirmation'?'selected' : '' }} value='Booking Confirmation'>Booking Confirmation</option>
                                        <option {{ $rextracker->disposition=='Callback Follow up'?'selected' : '' }} value='Callback Follow up'>Callback Follow up</option>
                                        <option {{ $rextracker->disposition=='Cancel/Future Credit'?'selected' : '' }} value='Cancel/Future Credit'>Cancel/Future Credit</option>
                                        <option {{ $rextracker->disposition=='Cancel/Refund'?'selected' : '' }} value='Cancel/Refund'>Cancel/Refund</option>
                                        <option {{ $rextracker->disposition=='Call Lost'?'selected' : '' }} value='Call Lost'>Call Lost</option>
                                        <option {{ $rextracker->disposition=='Callback Follow up'?'selected' : '' }} value='Callback Follow up'>Callback Follow up</option>
                                        <option {{ $rextracker->disposition=='Cancel/Future Credit'?'selected' : '' }} value='Cancel/Future Credit'>Cancel/Future Credit</option>
                                        <option {{ $rextracker->disposition=='Cancel/Refund'?'selected' : '' }} value='Cancel/Refund'>Cancel/Refund</option>
                                        <option {{ $rextracker->disposition=='Change Booking'?'selected' : '' }} value='Change Booking'>Change Booking</option>
                                        <option {{ $rextracker->disposition=='Credit Card Change'?'selected' : '' }} value='Credit Card Change'>Credit Card Change</option>
                                        <option {{ $rextracker->disposition=='Credit Use Enquiry'?'selected' : '' }} value='Credit Use Enquiry'>Credit Use Enquiry</option>
                                        <option {{ $rextracker->disposition=='Escalation'?'selected' : '' }} value='Escalation'>Escalation</option>
                                        <option {{ $rextracker->disposition=='Flight Confirmation'?'selected' : '' }} value='Flight Confirmation'>Flight Confirmation</option>
                                        <option {{ $rextracker->disposition=='Flight Information'?'selected' : '' }} value='Flight Information'>Flight Information</option>
                                        <option {{ $rextracker->disposition=='Flight Status'?'selected' : '' }} value='Flight Status'>Flight Status</option>
                                        <option {{ $rextracker->disposition=='Flight Availability'?'selected' : '' }} value='Flight Availability'>Flight Availability</option>
                                        <option {{ $rextracker->disposition=='Future Credit Request'?'selected' : '' }} value='Future Credit Request'>Future Credit Request</option>
                                        <option {{ $rextracker->disposition=='General Enquiries'?'selected' : '' }} value='General Enquiries'>General Enquiries</option>
                                        <option {{ $rextracker->disposition=='Lost Baggage'?'selected' : '' }} value='Lost Baggage'>Lost Baggage</option>
                                        <option {{ $rextracker->disposition=='Medical Handling'?'selected' : '' }} value='Medical Handling'>Medical Handling</option>
                                        <option {{ $rextracker->disposition=='Name Correction'?'selected' : '' }} value='Name Correction'>Name Correction</option>
                                        <option {{ $rextracker->disposition=='New Booking'?'selected' : '' }} value='New Booking'>New Booking</option>
                                        <option {{ $rextracker->disposition=='Online Check In Error'?'selected' : '' }} value='Online Check In Error'>Online Check In Error</option>
                                        <option {{ $rextracker->disposition=='Payment Confirmation'?'selected' : '' }} value='Payment Confirmation'>Payment Confirmation</option>
                                        <option {{ $rextracker->disposition=='Prepaid Baggage Request'?'selected' : '' }} value='Prepaid Baggage Request'>Prepaid Baggage Request</option>
                                        <option {{ $rextracker->disposition=='Rebooking'?'selected' : '' }} value='Rebooking'>Rebooking</option>
                                        <option {{ $rextracker->disposition=='Refund_Follow_Up'?'selected' : '' }} value='Refund_Follow_Up'>Refund_Follow_Up</option>
                                        <option {{ $rextracker->disposition=='Schedule_Change'?'selected' : '' }} value='Schedule_Change'>Schedule_Change</option>
                                        <option {{ $rextracker->disposition=='Seat Selection'?'selected' : '' }} value='Seat Selection'>Seat Selection</option>
                                        <option {{ $rextracker->disposition=='TA Cancellaition Policy'?'selected' : '' }} value='TA Cancellaition Policy'>TA Cancellaition Policy</option>
                                        <option {{ $rextracker->disposition=='TA Rebooking'?'selected' : '' }} value='TA Rebooking'>TA Rebooking</option>
                                        <option {{ $rextracker->disposition=='Tax Invoice Request'?'selected' : '' }} value='Tax Invoice Request'>Tax Invoice Request</option>
                                        <option {{ $rextracker->disposition=='Ticket Issuance'?'selected' : '' }} value='Ticket Issuance'>Ticket Issuance</option>
                                        <option {{ $rextracker->disposition=='UMNR'?'selected' : '' }} value='UMNR'>UMNR</option>
                                        <option {{ $rextracker->disposition=='Website Error'?'selected' : '' }} value='Website Error'>Website Error</option>
                                        <option {{ $rextracker->disposition=='Others'?'selected' : '' }} value='Others'>Others</option>
                                        <option {{ $rextracker->disposition=='Voucher Validity'?'selected' : '' }} value='Voucher Validity'>Voucher Validity</option>
                                        <option {{ $rextracker->disposition=='Wheelchair Assistance'?'selected' : '' }} value='Wheelchair Assistance'>Wheelchair Assistance</option>

                                        <option {{ $rextracker->disposition=="Other"? "selected" : "" }} value="Other">Other</option>

                                    </select>

                                </div>
                            </div>

                            <hr id="dispo-hr">

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter details" for="comments" class="col-md-2 col-form-label text-md-left">Comments</label>

                                <div class="col-md-10">
                                    <textarea style="height:200px;" id="comments" type="text" class="form-control" name="comments" value="" autocomplete="reason" autofocus>{{ $rextracker->comments ?? "" }}</textarea>

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

            {{-- @can('qa_access')
            <div class="col-4">
                <div class="card card-success">
                    <div class="card-header" >
                        <strong>QA Call Record # {{ $rextracker->id }}</strong>
        </div>

        <div class="card-body">
            @if(is_null($rextracker->qa_call_tracker_id))
            <form action="{{ route('admin.qacalltracker.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @else
                <div class="row">
                    <div class="col-12">
                        <p><strong>QA Agent:</strong><span style="font-style:italic; color:crimson; font-weight:900;" class="pl-4">{{ $rextracker->calltrackerQA->qa_name }}({{ $rextracker->calltrackerQA->qa_code }}) on {{ $rextracker->calltrackerQA->created_at }}</span></p>
                    </div>
                </div>
                <form action="{{ route('admin.qacalltracker.update', [$rextracker->qa_call_tracker_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @endif
                    <input type="hidden" name="rextracker_id" value="{{$rextracker->id ?? null }}">
                    <input type="hidden" name="tracker" value="helpdesk">
                    <div class="form-group row s1a">
                        <label data-toggle="tooltip" title="Select Call Status" for="call_status" class="col-md-4 col-form-label text-md-left">Call Status:</label>

                        <div class="col-md-8">
                            <select class="form-control select2" name="call_status" data-width="100%" id="call_status">
                                <option value="">Select a call status</option>
                                <option {{ !(is_null($rextracker->calltrackerQA)) && $rextracker->calltrackerQA->call_status == 'Complete' ? 'selected' : '' }} value="Complete">Complete</option>
                                <option {{ !(is_null($rextracker->calltrackerQA)) && $rextracker->calltrackerQA->call_status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row s1a">
                        <label data-toggle="tooltip" title="Select QA Status" for="qa_status" class="col-md-4 col-form-label text-md-left">QA Status:</label>

                        <div class="col-md-8">
                            <select class="form-control select2" name="qa_status" data-width="100%" id="qa_status">
                                <option value="">Select a qa status</option>
                                <option {{ isset($rextracker->calltrackerQA) && $rextracker->calltrackerQA->qa_status == 'Compliant' ? 'selected' : '' }} value="Compliant">Compliant</option>
                                <option {{ isset($rextracker->calltrackerQA) && $rextracker->calltrackerQA->qa_status == 'Non-Compliant' ? 'selected' : '' }} value="Non-Compliant">Non-Compliant</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row s1a">
                        <label data-toggle="tooltip" title="Select QA Outcome" for="qa_outcome" class="col-md-4 col-form-label text-md-left">QA Outcome:</label>

                        <div class="col-md-8">
                            <select class="form-control select2" name="qa_outcome" data-width="100%" id="qa_outcome">
                                <option value="">Select a qa outcome</option>
                                <option {{ isset($rextracker->calltrackerQA) && $rextracker->calltrackerQA->qa_outcome == "Call Management" ? 'selected' : '' }} value="Call Management">Call Management</option>
                                <option {{ isset($rextracker->calltrackerQA) && $rextracker->calltrackerQA->qa_outcome == "Compliant Call" ? 'selected' : '' }} value="Compliant Call">Compliant Call</option>
                                <option {{ isset($rextracker->calltrackerQA) && $rextracker->calltrackerQA->qa_outcome == "Customer Focus"  ? 'selected' : '' }} value="Customer Focus">Customer Focus</option>
                                <option {{ isset($rextracker->calltrackerQA) && $rextracker->calltrackerQA->qa_outcome == "Process and Procedures" ? 'selected' : '' }} value="Process and Procedures">Process and Procedures</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row s2">
                        <label data-toggle="tooltip" title="You must enter details" for="qa_comments" class="col-md-4 col-form-label text-md-left">QA Comments:</label>

                        <div class="col-md-8">
                            <textarea style="height:200px;" id="qa_comments" type="text" class="form-control" name="qa_comments" value="" autofocus>{{ $rextracker->calltrackerQA->qa_comments ?? null }}</textarea>
                        </div>
                    </div>


                    <div>
                        <input class="btn btn-success" type="submit" value="Update">
                    </div>
                </form>
        </div>
    </div>

    </div>
    @endcan --}}
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
            format: 'Hmm'
            , useCurrent: true
        });

        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $('#request_type').on('select2:select', function(e) {
            var data = e.params.data;
           // console.log(data);

            if (data.id == "") {
                $("#form-fields").hide();
            }

            if (data.id == "refund") {
                showRefundFields();
                hideCallbackFields();
                $("#form-fields").show();
            }

            if (data.id == "other_callback") {
                showCallbackFields();
                hideRefundFields();
                $("#form-fields").show();
            }
        });

        function showRefundFields() {
            $("#lbl-ta-booking, #select-ta-booking").show();
            $("#lbl-whole-booking, #select-whole-booking").show();
            ($("#whole_booking").val() == "Other") ? $("#other-booking-container").show(): null;
        }

        function hideRefundFields() {
            $("#lbl-ta-booking, #select-ta-booking").hide();
            $("#lbl-whole-booking, #select-whole-booking, #other-booking-container").hide();
        }

        function showCallbackFields() {
            $("#lbl-disposition, #select-disposition, #dispo-hr").show();
            $("#lbl-credit-req, #select-credit-req").show();
        }

        function hideCallbackFields() {
            $("#lbl-disposition, #select-disposition, #dispo-hr").hide();
            $("#lbl-credit-req, #select-credit-req").hide();
        }

        $('#whole_booking').on('select2:select', function(e) {
            var data = e.params.data;
            if (data.id == "Other") {
                $("#other-booking-container").show();
            } else {
                $("#other-booking-container").hide();
            }

            $("#other_booking").val('');
        });


        var req_type = "{{ $rextracker->request_type }}";
        firstload();

        function firstload() {
            if (req_type == "") {
                $("#form-fields").hide();
            }

            if (req_type == "refund") {
                showRefundFields();
                hideCallbackFields();
                $("#form-fields").show();
            }

            if (req_type == "other_callback") {
                showCallbackFields();
                hideRefundFields();
                $("#form-fields").show();
            }
        }
        
    });

</script>
@endsection
