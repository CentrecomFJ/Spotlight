@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Helpdesk Entry</h1>
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
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Query Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="moh-tracker-form" method="POST" style="min-height:300px;" id="sales-tracker-form" action="{{ route('admin.covidtracker.store') }}">
                            @csrf
                            <!-- skill -->
                            {{-- <h5 style="text-decoration: underline;">Call Details</h5> --}}
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

                                <label data-placement="bottom" data-toggle="tooltip" title="Please refer to reference number" for="ref_no" class="col-md-2 col-form-label text-md-left">Ref No:</label>

                                <div class="col-md-4">
                                    <input id="ref_no" type="text" value="{{ $refno ?? '' }}" class="form-control" name="ref_no" required autocomplete="title" readonly>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Call Time" for="call_date" class="col-md-2 col-form-label text-md-left">Call Time:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="call-timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="call_time" data-target="#call-timepicker" value="{{ date('h:i:s') ?? '' }}" required>
                                        <div class="input-group-append" data-target="#call-timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-toggle="tooltip" title="Select Call Direction." for="call_direction" class="col-md-2 col-form-label text-md-left">Call Direction:</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="call_direction" data-width="100%" id="call_direction" required>
                                        <option value="">Select call direction</option>
                                        <option value="INBOUND" selected>INBOUND</option>
                                        <option value="OUTBOUND">OUTBOUND</option>

                                    </select>

                                </div>
                            </div>
                            <hr>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select Call Type." for="call_type" class="col-md-2 col-form-label text-md-left">Call Type:</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="call_type" data-width="100%" id="call_type" required>
                                        <option value="">Select call type</option>
                                        <option value="Health">Health</option>
                                        <option value="Abuse">Abuse</option>
                                        <option value="General">General</option>

                                    </select>

                                </div>

                                <label data-toggle="tooltip" title="Type in Avaya Call reference" for="avaya_callref" class="col-md-2 col-form-label text-md-left">AVAYA REF:</label>

                                <div class="col-md-4">
                                    <input id="avaya_callref" type="text" value="" class="form-control" name="avaya_callref" autocomplete="title" autofocus required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-2">Symptoms:</label>
                                <input id="symptomsInput" type="hidden" name="symptoms">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="icheck-primary d-inline m-2">
                                            <input type="checkbox" class="symptoms" value="fever">
                                            <label>
                                                fever
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline m-2">
                                            <input type="checkbox" class="symptoms" value=" dry cough">
                                            <label>
                                                dry cough
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline m-2">
                                            <input type="checkbox" class="symptoms" value="tiredness">
                                            <label>
                                                tiredness
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="aches and pains">
                                            <label>
                                                aches and pains
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="sore throat">
                                            <label>
                                                sore throat
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="diarrhoea">
                                            <label>
                                                diarrhoea
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="conjunctivitis">
                                            <label>
                                                conjunctivitis
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="headache">
                                            <label>
                                                headache
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="loss of taste or smell">
                                            <label>
                                                loss of taste or smell
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline  m-2">
                                            <input type="checkbox" class="symptoms" value="a rash on skin or discolouration of fingers or toes">
                                            <label>
                                                a rash on skin or discolouration of fingers or toes
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="icheck-primary d-inline m-2">
                                            <input type="checkbox" class="symptoms" value="difficulty breathing or shortness of breath">
                                            <label>
                                                difficulty breathing or shortness of breath
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline m-2">
                                            <input type="checkbox" class="symptoms" value="chest pain or pressure">
                                            <label>
                                                chest pain or pressure
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline m-2">
                                            <input type="checkbox" class="symptoms" value="loss of speech or movement">
                                            <label>
                                                loss of speech or movement
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Has the caller being in contact with another that has contracted COVID-19?" for="known_contact" class="col-md-4 col-form-label text-md-left">Has the caller being in contact with a known case?</label>
                                <div class="col-md-2">
                                    <select class="form-control select2" name="known_contact" data-width="100%" id="known_contact" required>

                                        <option value="N/a" selected>N/a</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>

                                    </select>

                                </div>

                                <label data-toggle="tooltip" title="Has the caller being travelled abroad recently?" for="travelled" class="col-md-4 col-form-label text-md-left">Has the caller being travelled abroad recently?</label>
                                <div class="col-md-2">
                                    <select class="form-control select2" name="travelled" data-width="100%" id="travelled" required>

                                        <option value="N/a" selected>N/a</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>

                                    </select>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter details" for="query_details" class="col-md-2 col-form-label text-md-left">Query Details:</label>

                                <div class="col-md-10">
                                    <textarea style="height:200px;" id="query_details" type="text" class="form-control" name="query_details" value="" autocomplete="reason" autofocus required></textarea>

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

            <div class="col-6">
                <div class="card card-secondary">
                    <div class="card-header" style="">
                        <h4>Caller Details</h4>

                    </div>
                    <div class="card-body">
                        <!-- skill -->
                        {{-- <h5 style="text-decoration: underline;">Call Details</h5> --}}
                        <div class="form-group row s1a">
                            <label data-placement="bottom" data-toggle="tooltip" title="Type in Full name" for="fullname" class="col-md-2 col-form-label text-md-left">Full name:</label>
                            <div class="col-md-4">
                                <input id="fullname" type="text" value="" class="form-control" name="fullname" autocomplete="title" form="moh-tracker-form" autofocus required>
                            </div>
                            <label data-placement="bottom" data-toggle="tooltip" title="Type in Full name" for="phone" class="col-md-2 col-form-label text-md-left">Phone:</label>
                            <div class="col-md-4">
                                <input id="phone" type="text" value="" class="form-control" name="phone" autocomplete="title" form="moh-tracker-form" autofocus>
                            </div>
                        </div>

                        <div class="form-group row s1a">
                            <label data-toggle="tooltip" title="Select Call Type." for="gender" class="col-md-2 col-form-label text-md-left">Gender:</label>

                            <div class="col-md-4">

                                <select class="form-control select2" name="gender" data-width="100%" id="gender" form="moh-tracker-form" required>
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                            </div>

                            <label data-placement="bottom" data-toggle="tooltip" title="Type in Email" for="email_address" class="col-md-2 col-form-label text-md-left">Email:</label>
                            <div class="col-md-4">
                                <input id="email_address" type="email" value="" class="form-control" name="email_address" autocomplete="title" form="moh-tracker-form" autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row s1a">
                            <label data-toggle="tooltip" title="Select Callers Location." for="location" class="col-md-2 col-form-label text-md-left">Location:</label>

                            <div class="col-md-4">
                                <select class="form-control select2" name="location" data-width="100%" id="location" form="moh-tracker-form" required>
                                    <option value="">Select location</option>
                                    <option value='Ba'>Ba</option>
                                    <option value='Beqa'>Beqa</option>
                                    <option value='Deuba '>Deuba </option>
                                    <option value='Dreketi'>Dreketi</option>
                                    <option value='Gau'>Gau</option>
                                    <option value='Kadavu'>Kadavu</option>
                                    <option value='Koro Island'>Koro Island</option>
                                    <option value='Korolevu'>Korolevu</option>
                                    <option value='Korovou'>Korovou</option>
                                    <option value='Labasa'>Labasa</option>
                                    <option value='Lami'>Lami</option>
                                    <option value='Lau Group'>Lau Group</option>
                                    <option value='Lautoka'>Lautoka</option>
                                    <option value='Levuka'>Levuka</option>
                                    <option value='Lomawai'>Lomawai</option>
                                    <option value='Mamanuca'>Mamanuca</option>
                                    <option value='Nadi'>Nadi</option>
                                    <option value='Nasinu'>Nasinu</option>
                                    <option value='Natabua'>Natabua</option>
                                    <option value='Nausori'>Nausori</option>
                                    <option value='Navua'>Navua</option>
                                    <option value='Rabi'>Rabi</option>
                                    <option value='Rakiraki'>Rakiraki</option>
                                    <option value='Savusavu'>Savusavu</option>
                                    <option value='Seaqaqa'>Seaqaqa</option>
                                    <option value='Sigatoka'>Sigatoka</option>
                                    <option value='Suva'>Suva</option>
                                    <option value='Taveuni'>Taveuni</option>
                                    <option value='Tavua'>Tavua</option>
                                    <option value='Vatukoula'>Vatukoula</option>
                                    <option value='Yasawa'>Yasawa</option>
                                </select>
                            </div>

                            <label data-toggle="tooltip" title="Select Callers Division." for="division" class="col-md-2 col-form-label text-md-left">Division:</label>
                            <div class="col-md-4">
                                <select class="form-control select2" name="division" data-width="100%" id="division" form="moh-tracker-form" required>
                                    <option value="">Select division</option>
                                    <option value='EAST'>EAST</option>
                                    <option value='Fever Clinic'>Fever Clinic</option>
                                    <option value='MHMS'>MHMS</option>
                                    <option value='N/A'>N/A</option>
                                    <option value='Surveillance Central'>Surveillance Central</option>
                                    <option value='Surveillance Eastern'>Surveillance Eastern</option>
                                    <option value='Surveillance North'>Surveillance North</option>
                                    <option value='Surveillance Western'>Surveillance Western</option>
                                    <option value='WEST'>WEST</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row s2">
                            <label data-toggle="tooltip" title="You must enter details" for="physical_address" class="col-md-2 col-form-label text-md-left">Physical Address:</label>

                            <div class="col-md-10">
                                <textarea style="height:50px;" id="physical_address" type="text" class="form-control" name="physical_address" value="" autocomplete="physical_address" form="moh-tracker-form" autofocus required></textarea>

                            </div>
                        </div>

                        <hr>
                        <div class="form-group row s1a">
                            <label data-toggle="tooltip" title="Call Disposition" for="query_type" class="col-md-2 col-form-label text-md-left">Call Disposition:</label>
                            <div class="col-md-4">
                                <select class="form-control select2" name="query_type" data-width="100%" id="query_type" form="moh-tracker-form" required>

                                    <option value="" selected>N/a</option>
                                    <option value='Business Operations'>Business Operations</option>
                                    <option value='Child Abuse'>Child Abuse</option>
                                    <option value='Complaint Health'>Complaint Health</option>
                                    <option value='Complaint Police'>Complaint Police</option>
                                    <option value='Contact Tracing'>Contact Tracing</option>
                                    <option value='COVID19 General Info'>COVID19 General Info</option>
                                    <option value='Curfew'>Curfew</option>
                                    <option value='Domestic Violence'>Domestic Violence</option>
                                    <option value='FNPF'>FNPF</option>
                                    <option value='Food Ration'>Food Ration</option>
                                    <option value='International Travel'>International Travel</option>
                                    <option value='Local Travel'>Local Travel</option>
                                    <option value='Lockdown Restrictions'>Lockdown Restrictions</option>
                                    <option value='MCTT Pass'>MCTT Pass</option>
                                    <option value='MoH Pass'>MoH Pass</option>
                                    <option value='Other Health'>Other Health</option>
                                    <option value='Screening Clinic'>Screening Clinic</option>
                                    <option value='Swab Test Request'>Swab Test Request</option>
                                    <option value='Swab Test Results'>Swab Test Results</option>
                                    <option value='Vaccination Registration'>Vaccination Registration</option>
                                    <option value='Vaccination Sites'>Vaccination Sites</option>
                                    <option value='Vaccination Visits '>Vaccination Visits </option>


                                </select>

                            </div>
                        </div>

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
        $("#call_date").datepicker();

        // //Timepicker
        var startTime = $('#call-timepicker').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        /*$('.select2bs4').select2({
            theme: 'bootstrap4'
        });*/

        $('#opening_date').datepicker({
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
        }
        /*
        $('form#moh-tracker-form').submit(function() {
            $("#sales-tracker-submit").prop('disabled', true);
        });
        */
    });

</script>
@endsection
