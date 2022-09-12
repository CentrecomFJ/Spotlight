@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Rex Tracker Entry</h1>
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
                        <h4>Tracker Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{ route('admin.rextracker.store') }}">
                            @csrf
                            <hr>
                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose request type" for="request_type" class="col-md-2 col-form-label text-md-left">Request Type</label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="request_type" data-width="100%" id="request_type">
                                        <option value="" selected> -- select request -- </option>
                                        <option value="refund">Refund</option>
                                        <option value="other_callback">Other/Callback</option>
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <div id="form-fields" style="display:none;">
                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Call Date." for="entry_date" class="col-md-2 col-form-label text-md-left">Date</label>

                                    <div class="col-md-4">

                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="text" class="form-control" name="entry_date" value="{{ date('Y-m-d') ?? '' }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Please refer to reference number" for="ref_no" class="col-md-2 col-form-label text-md-left">Ref No</label>

                                    <div class="col-md-4">
                                        <input id="ref_no" type="text" value="{{ $refno ?? '' }}" class="form-control" name="ref_no" required autocomplete="title" readonly>
                                    </div>
                                </div>

                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Time" for="entry_time" class="col-md-2 col-form-label text-md-left">Time</label>

                                    <div class="col-md-4">

                                        <div class="input-group date" id="entry-timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="entry_time" data-target="#entry-timepicker" value="{{ date('Gi') ?? '' }}">
                                            <div class="input-group-append" data-target="#entry-timepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row s1a">
                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in First name" for="fname" class="col-md-2 col-form-label text-md-left">Caller First name</label>
                                    <div class="col-md-4">
                                        <input id="fname" type="text" value="" class="form-control" name="fname" autocomplete="title" autofocus required>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in Last name" for="lname" class="col-md-2 col-form-label text-md-left">Caller Last name</label>
                                    <div class="col-md-4">
                                        <input id="lname" type="text" value="" class="form-control" name="lname" autocomplete="title" autofocus required>
                                    </div>
                                </div>

                                <div class="form-group row s1a">

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in Primary Phone Number" for="primary_phone" class="col-md-2 col-form-label text-md-left">Primary Phone:</label>
                                    <div class="col-md-4">
                                        <input id="primary_phone" type="text" value="" class="form-control" name="primary_phone" autocomplete="title" autofocus required>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in Secondary Phone Number" for="secondary_phone" class="col-md-2 col-form-label text-md-left">Secondary Phone:</label>
                                    <div class="col-md-4">
                                        <input id="secondary_phone" type="text" value="" class="form-control" name="secondary_phone" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row s1a">
                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in Email" for="email_address" class="col-md-2 col-form-label text-md-left">Email</label>
                                    <div class="col-md-4">
                                        <input id="email_address" type="email" value="" class="form-control" name="email_address" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row s1a">
                                    <label id="lbl-ta-booking" data-placement="bottom" data-toggle="tooltip" title="Is it a Travel Agent Booking?" for="ta_booking" class="col-md-3 col-form-label text-md-left">Travel Agent Booking</label>
                                    <div id="select-ta-booking" class="col-md-3">
                                        <select class="form-control select2" name="ta_booking" id="ta_booking">
                                            <option value="" selected> -- select option -- </option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in Booking reference" for="booking_ref" class="col-md-2 col-form-label text-md-left">Booking Reference</label>
                                    <div class="col-md-4">
                                        <input id="booking_ref" type="text" value="" class="form-control" name="booking_ref" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row s1a">
                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in passenger First name" for="pass_fname" class="col-md-2 col-form-label text-md-left">Passenger First name</label>
                                    <div class="col-md-4">
                                        <input id="pass_fname" type="text" value="" class="form-control" name="pass_fname" autocomplete="title" autofocus>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in passenger Last name" for="pass_lname" class="col-md-2 col-form-label text-md-left">Passenger Last name</label>
                                    <div class="col-md-4">
                                        <input id="pass_lname" type="text" value="" class="form-control" name="pass_lname" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row s1a">
                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in ticket numbers" for="ticket_num" class="col-md-2 col-form-label text-md-left">Ticket Numbers</label>
                                    <div class="col-md-4">
                                        <input id="ticket_num" type="text" value="" class="form-control" name="ticket_num" autocomplete="title" autofocus>
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
                                            <option value="" selected> -- select option -- </option>
                                            <option value="Whole_Booking">Whole_Booking</option>
                                            <option value="Partial_Refund">Partial_Refund</option>
                                            <option value="Full_Refund_of_Ticket">Full_Refund_of_Ticket</option>
                                            <option value="Full_Refund_of_Tickets">Full_Refund_of_Tickets</option>
                                            <option value="Full_Refund">Full_Refund</option>
                                            <option value="Cancel_Segment">Cancel_Segment</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    {{-- <label data-placement="bottom" data-toggle="tooltip" title="Type in Booking reference" for="other_booking" class="col-md-2 col-form-label text-md-left">Other:</label> --}}
                                    <div id="other-booking-container" class="col-md-4" style="display:none;">
                                        <input id="other_booking" type="text" value="" class="form-control" name="other_booking" autocomplete="title" autofocus placeholder="Other booking?">
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Is your flight within the next 24hrs?" for="flight_24hrs" class="col-md-3 col-form-label text-md-left">Urgent/ Travel within 24 hours?</label>
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="flight_24hrs" id="flight_24hrs">
                                            <option value="" selected> -- select option -- </option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>

                                        </select>

                                    </div>

                                    <label id="lbl-credit-req" data-toggle="tooltip" title="Credit Request?" for="credit_req" class="col-md-3 col-form-label text-md-left">Credit Request?</label>
                                    <div id="select-credit-req" class="col-md-3">
                                        <select class="form-control select2" name="credit_req" data-width="100%" id="credit_req">

                                            <option value="" selected> -- select option -- </option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>

                                        </select>

                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row s2">
                                    <label id="lbl-disposition" data-toggle="tooltip" title="Call Disposition?" for="disposition" class="col-md-3 col-form-label text-md-left">Call Disposition</label>
                                    <div id="select-disposition" class="col-md-4">
                                        <select class="form-control select2" name="disposition" data-width="100%" id="disposition">

                                            <option value="" selected> -- select disposition -- </option>
                                            <option value="Refund_Follow_Up">Refund_Follow_Up</option>
                                            <option value="Escalation">Escalation</option>
                                            <option value="Rebooking">Rebooking</option>
                                            <option value="New_Booking">New_Booking</option>
                                            <option value="Purchasing_Ancillary_Services">Purchasing_Ancillary_Services</option>
                                            <option value="Schedule_Change">Schedule_Change</option>

                                            <option value='Categories for Other Call-back Requests'>Categories for Other Call-back Requests</option>
                                            <option value='Baggage Inquiry'>Baggage Inquiry</option>
                                            <option value='Booking Confirmation'>Booking Confirmation</option>
                                            <option value='Callback Follow up'>Callback Follow up</option>
                                            <option value='Cancel/Future Credit'>Cancel/Future Credit</option>
                                            <option value='Cancel/Refund'>Cancel/Refund</option>
                                            <option value='Call Lost'>Call Lost</option>
                                            <option value='Callback Follow up'>Callback Follow up</option>
                                            <option value='Cancel/Future Credit'>Cancel/Future Credit</option>
                                            <option value='Cancel/Refund'>Cancel/Refund</option>
                                            <option value='Change Booking'>Change Booking</option>
                                            <option value='Credit Card Change'>Credit Card Change</option>
                                            <option value='Credit Use Enquiry'>Credit Use Enquiry</option>
                                            <option value='Escalation'>Escalation</option>
                                            <option value='Flight Confirmation'>Flight Confirmation</option>
                                            <option value='Flight Information'>Flight Information</option>
                                            <option value='Flight Status'>Flight Status</option>
                                            <option value='Flight Availability'>Flight Availability</option>
                                            <option value='Future Credit Request'>Future Credit Request</option>
                                            <option value='General Enquiries'>General Enquiries</option>
                                            <option value='Lost Baggage'>Lost Baggage</option>
                                            <option value='Medical Handling'>Medical Handling</option>
                                            <option value='Name Correction'>Name Correction</option>
                                            <option value='New Booking'>New Booking</option>
                                            <option value='Online Check In Error'>Online Check In Error</option>
                                            <option value='Payment Confirmation'>Payment Confirmation</option>
                                            <option value='Prepaid Baggage Request'>Prepaid Baggage Request</option>
                                            <option value='Rebooking'>Rebooking</option>
                                            <option value='Refund_Follow_Up'>Refund_Follow_Up</option>
                                            <option value='Schedule_Change'>Schedule_Change</option>
                                            <option value='Seat Selection'>Seat Selection</option>
                                            <option value='TA Cancellaition Policy'>TA Cancellaition Policy</option>
                                            <option value='TA Rebooking'>TA Rebooking</option>
                                            <option value='Tax Invoice Request'>Tax Invoice Request</option>
                                            <option value='Ticket Issuance'>Ticket Issuance</option>
                                            <option value='UMNR'>UMNR</option>
                                            <option value='Website Error'>Website Error</option>
                                            <option value='Others'>Others</option>
                                            <option value='Voucher Validity'>Voucher Validity</option>
                                            <option value='Wheelchair Assistance'>Wheelchair Assistance</option>

                                            <option value="Other">Other</option>

                                        </select>

                                    </div>
                                </div>

                                <hr id="dispo-hr">

                                <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="comments" class="col-md-2 col-form-label text-md-left">Comments</label>

                                    <div class="col-md-10">
                                        <textarea style="height:200px;" id="comments" type="text" class="form-control" name="comments" value="" autocomplete="reason" autofocus></textarea>

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

                                <div>

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
        $("#entry_date").datepicker();

        // //Timepicker
        var startTime = $('#entry-timepicker').datetimepicker({
            format: 'Hmm'
            , useCurrent: true
        });

        //Initialize Select2 Elements
        $('.select2').select2();


        $('#request_type').on('select2:select', function(e) {
            var data = e.params.data;
            console.log(data);

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
        }

        function hideRefundFields() {
            $("#lbl-ta-booking, #select-ta-booking").hide();
            $("#lbl-whole-booking, #select-whole-booking").hide();
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

        //Initialize Select2 Elements
        /*$('.select2bs4').select2({
            theme: 'bootstrap4'
        });*/

        /*  $('#opening_date').datepicker({
              format: 'yyyy-mm-dd'
          , });

          $('#sub_category').on('select2:select', function(e) {
              var data = e.params.data;
              console.log(data);
              if (data.id == "Enquiry") {
                  $("#enquiry-section").show();
                  $("#escalations-section").hide();
                  $("#complaints-section").hide();
              }

              if (data.id == "Escalations") {
                  $("#enquiry-section").hide();
                  $("#escalations-section").show();
                  $("#complaints-section").hide();
              }

              if (data.id == "Complaints") {
                  $("#enquiry-section").hide();
                  $("#escalations-section").hide();
                  $("#complaints-section").show();
              }

              if (data.id == "") {
                  $("#enquiry-section").hide();
                  $("#escalations-section").hide();
                  $("#complaints-section").hide();
              }
          });

          $(".symptoms").on('change', function(e) {
              e.preventDefault();
              symptomsStringy();
          });

          function symptomsStringy() {
              var symptoms = $('.symptoms:checkbox:checked').map(function() {
                  return $(this).val();
              }).get();
              //console.log(symptoms.toString());
              $("#symptomsInput").val(symptoms.toString());
          }*/
        /*
        $('form#moh-tracker-form').submit(function() {
            $("#sales-tracker-submit").prop('disabled', true);
        });
        */
    });

</script>
@endsection
