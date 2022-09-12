@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Call Record</h1>
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
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header" style="color:black;background:#d4d13d;">
                        <strong>{{ trans('global.edit') }} Helpdesk Record # {{ $covidtracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.covidtracker.update', [$covidtracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$covidtracker->id ?? null }}">

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Call Date." for="call_date" class="col-md-2 col-form-label text-md-left">Call Date:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" name="call_date" value="{{ $covidtracker->call_date }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Please refer to reference number" for="ref_no" class="col-md-2 col-form-label text-md-left">Ref No:</label>

                                <div class="col-md-4">
                                    <input id="ref_no" type="text" value="{{ $covidtracker->ref_no ?? 'N/a' }}" class="form-control" name="ref_no" required autocomplete="title" readonly>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Call Time" for="call_date" class="col-md-2 col-form-label text-md-left">Call Time:</label>

                                <div class="col-md-4">

                                    <div class="input-group date" id="call-timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="call_time" data-target="#call-timepicker" value="{{ $covidtracker->call_time  }}" required>
                                        <div class="input-group-append" data-target="#call-timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <label data-toggle="tooltip" title="Select Call Direction." for="call_direction" class="col-md-2 col-form-label text-md-left">Call Direction:</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="call_direction" data-width="100%" id="call_direction" required>
                                        <option value="">Select call direction</option>
                                        <option {{ $covidtracker->call_direction == "INBOUND"? 'selected' : '' }} value="INBOUND">INBOUND</option>
                                        <option {{ $covidtracker->call_direction == "OUTBOUND"? 'selected' : '' }} value="OUTBOUND">OUTBOUND</option>

                                    </select>

                                </div>
                            </div>
                            <hr>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select Call Type." for="call_type" class="col-md-2 col-form-label text-md-left">Call Type:</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="call_type" data-width="100%" id="call_type" required>
                                        <option value="">Select call type</option>
                                        <option {{ $covidtracker->call_type == "Health"? 'selected' : '' }} value="Health">Health</option>
                                        <option {{ $covidtracker->call_type == "Abuse"? 'selected' : '' }} value="Abuse">Abuse</option>
                                        <option {{ $covidtracker->call_type == "General"? 'selected' : '' }} value="General">General</option>
                                    </select>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-2">Symptoms:</label>
                                <input id="symptomsInput" type="hidden" name="symptoms" value="{{ $covidtracker->symptoms ?? '' }}">
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

                                        <option {{ $covidtracker->known_contact == "N/a"? 'selected' : '' }} value="N/a">N/a</option>
                                        <option {{ $covidtracker->known_contact == "Yes"? 'selected' : '' }} value="Yes">Yes</option>
                                        <option {{ $covidtracker->known_contact == "No"? 'selected' : '' }} value="No">No</option>

                                    </select>

                                </div>

                                <label data-toggle="tooltip" title="Has the caller being travelled abroad recently?" for="travelled" class="col-md-4 col-form-label text-md-left">Has the caller being travelled abroad recently?</label>
                                <div class="col-md-2">
                                    <select class="form-control select2" name="travelled" data-width="100%" id="travelled">

                                        <option {{ $covidtracker->travelled == "N/a"? 'selected' : '' }} value="N/a">N/a</option>
                                        <option {{ $covidtracker->travelled == "Yes"? 'selected' : '' }} value="Yes">Yes</option>
                                        <option {{ $covidtracker->travelled == "No"? 'selected' : '' }} value="No">No</option>

                                    </select>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter details" for="query_details" class="col-md-2 col-form-label text-md-left">Query Details:</label>

                                <div class="col-md-10">
                                    <textarea style="height:200px;" id="query_details" type="text" class="form-control" name="query_details" value="" autocomplete="reason" autofocus>{{ $covidtracker->query_details  }}</textarea>

                                </div>
                            </div>
                            <div>
                                <button type="submit" id="sales-tracker-submit" class="btn btn-primary pull-right">
                                    Save
                                </button>
                                {{-- <input id="sales-tracker-submit" class="btn btn-danger pull-right" type="submit" onclick="this.disabled=true; this.value='Saving, please wait...';this.form.submit();" value="Save" /> --}}
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
                                <input id="fullname" type="text" value="{{ $covidtracker->fullname ?? 'N/a' }}" class="form-control" name="fullname" autocomplete="title" form="moh-tracker-form" autofocus required>
                            </div>
                            <label data-placement="bottom" data-toggle="tooltip" title="Type in Phone number" for="phone" class="col-md-2 col-form-label text-md-left">Phone:</label>
                            <div class="col-md-4">
                                <input id="phone" type="text" value="{{ $covidtracker->phone ?? '' }}" class="form-control" name="phone" autocomplete="title" form="moh-tracker-form" autofocus>
                            </div>
                        </div>

                        <div class="form-group row s1a">
                            <label data-toggle="tooltip" title="Select Call Type." for="gender" class="col-md-2 col-form-label text-md-left">Gender:</label>

                            <div class="col-md-4">

                                <select class="form-control select2" name="gender" data-width="100%" id="gender" form="moh-tracker-form" required>
                                    <option value="">Select gender</option>
                                    <option {{ $covidtracker->gender == "Male"? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ $covidtracker->gender == "Female"? 'selected' : '' }} value="Female">Female</option>
                                </select>

                            </div>

                            <label data-placement="bottom" data-toggle="tooltip" title="Type in Email" for="email_address" class="col-md-2 col-form-label text-md-left">Email:</label>
                            <div class="col-md-4">
                                <input id="email_address" type="email" value="{{ $covidtracker->email_address ?? '' }}" class="form-control" name="email_address" autocomplete="title" form="moh-tracker-form" autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row s1a">
                            <label data-toggle="tooltip" title="Select Callers Location." for="location" class="col-md-2 col-form-label text-md-left">Location:</label>

                            <div class="col-md-4">
                                <select class="form-control select2" name="location" data-width="100%" id="location" form="moh-tracker-form" required>
                                    <option value="">Select location</option>
                                    <option {{ $covidtracker->location == "Ba"? 'selected' : '' }} value='Ba'>Ba</option>
                                    <option {{ $covidtracker->location == "Beqa"? 'selected' : '' }} value='Beqa'>Beqa</option>
                                    <option {{ $covidtracker->location == "Deuba"? 'selected' : '' }} value='Deuba '>Deuba </option>
                                    <option {{ $covidtracker->location == "Dreketi"? 'selected' : '' }} value='Dreketi'>Dreketi</option>
                                    <option {{ $covidtracker->location == "Gau"? 'selected' : '' }} value='Gau'>Gau</option>
                                    <option {{ $covidtracker->location == "Kadavu"? 'selected' : '' }} value='Kadavu'>Kadavu</option>
                                    <option {{ $covidtracker->location == "Koro Island"? 'selected' : '' }} value='Koro Island'>Koro Island</option>
                                    <option {{ $covidtracker->location == "Korolevu"? 'selected' : '' }} value='Korolevu'>Korolevu</option>
                                    <option {{ $covidtracker->location == "Korovou"? 'selected' : '' }} value='Korovou'>Korovou</option>
                                    <option {{ $covidtracker->location == "Labasa"? 'selected' : '' }} value='Labasa'>Labasa</option>
                                    <option {{ $covidtracker->location == "Lami"? 'selected' : '' }} value='Lami'>Lami</option>
                                    <option {{ $covidtracker->location == "Lau Group"? 'selected' : '' }} value='Lau Group'>Lau Group</option>
                                    <option {{ $covidtracker->location == "Lautoka"? 'selected' : '' }} value='Lautoka'>Lautoka</option>
                                    <option {{ $covidtracker->location == "Levuka"? 'selected' : '' }} value='Levuka'>Levuka</option>
                                    <option {{ $covidtracker->location == "Lomawai"? 'selected' : '' }} value='Lomawai'>Lomawai</option>
                                    <option {{ $covidtracker->location == "Mamanuca"? 'selected' : '' }} value='Mamanuca'>Mamanuca</option>
                                    <option {{ $covidtracker->location == "Nadi"? 'selected' : '' }} value='Nadi'>Nadi</option>
                                    <option {{ $covidtracker->location == "Nasinu"? 'selected' : '' }} value='Nasinu'>Nasinu</option>
                                    <option {{ $covidtracker->location == "Natabua"? 'selected' : '' }} value='Natabua'>Natabua</option>
                                    <option {{ $covidtracker->location == "Nausori"? 'selected' : '' }} value='Nausori'>Nausori</option>
                                    <option {{ $covidtracker->location == "Navua"? 'selected' : '' }} value='Navua'>Navua</option>
                                    <option {{ $covidtracker->location == "Rabi"? 'selected' : '' }} value='Rabi'>Rabi</option>
                                    <option {{ $covidtracker->location == "Rakiraki"? 'selected' : '' }} value='Rakiraki'>Rakiraki</option>
                                    <option {{ $covidtracker->location == "Savusavu"? 'selected' : '' }} value='Savusavu'>Savusavu</option>
                                    <option {{ $covidtracker->location == "Seaqaqa"? 'selected' : '' }} value='Seaqaqa'>Seaqaqa</option>
                                    <option {{ $covidtracker->location == "Sigatoka"? 'selected' : '' }} value='Sigatoka'>Sigatoka</option>
                                    <option {{ $covidtracker->location == "Suva"? 'selected' : '' }} value='Suva'>Suva</option>
                                    <option {{ $covidtracker->location == "Taveuni"? 'selected' : '' }} value='Taveuni'>Taveuni</option>
                                    <option {{ $covidtracker->location == "Tavua"? 'selected' : '' }} value='Tavua'>Tavua</option>
                                    <option {{ $covidtracker->location == "Vatukoula"? 'selected' : '' }} value='Vatukoula'>Vatukoula</option>
                                    <option {{ $covidtracker->location == "Yasawa"? 'selected' : '' }} value='Yasawa'>Yasawa</option>
                                </select>
                            </div>

                            <label data-toggle="tooltip" title="Select Callers Division." for="division" class="col-md-2 col-form-label text-md-left">Division:</label>
                            <div class="col-md-4">
                                <select class="form-control select2" name="division" data-width="100%" id="division" form="moh-tracker-form" required>
                                    <option value="">Select division</option>
                                    <option {{ $covidtracker->division == "EAST"? 'selected' : '' }} value='EAST'>EAST</option>
                                    <option {{ $covidtracker->division == "Fever Clinic"? 'selected' : '' }} value='Fever Clinic'>Fever Clinic</option>
                                    <option {{ $covidtracker->division == "MHMS"? 'selected' : '' }} value='MHMS'>MHMS</option>
                                    <option {{ $covidtracker->division == "N/A"? 'selected' : '' }} value='N/A'>N/A</option>
                                    <option {{ $covidtracker->division == "Surveillance Central"? 'selected' : '' }} value='Surveillance Central'>Surveillance Central</option>
                                    <option {{ $covidtracker->division == "Surveillance Eastern"? 'selected' : '' }} value='Surveillance Eastern'>Surveillance Eastern</option>
                                    <option {{ $covidtracker->division == "Surveillance North"? 'selected' : '' }} value='Surveillance North'>Surveillance North</option>
                                    <option {{ $covidtracker->division == "Surveillance Western"? 'selected' : '' }} value='Surveillance Western'>Surveillance Western</option>
                                    <option {{ $covidtracker->division == "WEST"? 'selected' : '' }} value='WEST'>WEST</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row s2">
                            <label data-toggle="tooltip" title="You must enter details" for="physical_address" class="col-md-2 col-form-label text-md-left">Physical Address:</label>

                            <div class="col-md-10">
                                <textarea style="height:50px;" id="physical_address" type="text" class="form-control" name="physical_address" value="{{ $covidtracker->physical_address ?? 'N/a' }}" autocomplete="physical_address" form="moh-tracker-form" autofocus required>{{ $covidtracker->physical_address ?? '' }}</textarea>

                            </div>
                        </div>

                        <hr>
                        <div class="form-group row s1a">
                            <label data-toggle="tooltip" title="Call Disposition" for="query_type" class="col-md-2 col-form-label text-md-left">Call Disposition:</label>
                            <div class="col-md-4">
                                <select class="form-control select2" name="query_type" data-width="100%" id="query_type" form="moh-tracker-form" required>

                                    <option value="" selected>N/a</option>
                                    <option {{ $covidtracker->query_type == "Business Operations"? 'selected' : '' }} value='Business Operations'>Business Operations</option>
                                    <option {{ $covidtracker->query_type == "Child Abuse"? 'selected' : '' }} value='Child Abuse'>Child Abuse</option>
                                    <option {{ $covidtracker->query_type == "Complaint Health"? 'selected' : '' }} value='Complaint Health'>Complaint Health</option>
                                    <option {{ $covidtracker->query_type == "Complaint Police"? 'selected' : '' }} value='Complaint Police'>Complaint Police</option>
                                    <option {{ $covidtracker->query_type == "Contact Tracing"? 'selected' : '' }} value='Contact Tracing'>Contact Tracing</option>
                                    <option {{ $covidtracker->query_type == "COVID19 General Info"? 'selected' : '' }} value='COVID19 General Info'>COVID19 General Info</option>
                                    <option {{ $covidtracker->query_type == "Curfew"? 'selected' : '' }} value='Curfew'>Curfew</option>
                                    <option {{ $covidtracker->query_type == "Domestic Violence"? 'selected' : '' }} value='Domestic Violence'>Domestic Violence</option>
                                    <option {{ $covidtracker->query_type == "FNPF"? 'selected' : '' }} value='FNPF'>FNPF</option>
                                    <option {{ $covidtracker->query_type == "Food Ration"? 'selected' : '' }} value='Food Ration'>Food Ration</option>
                                    <option {{ $covidtracker->query_type == "International Travel"? 'selected' : '' }} value='International Travel'>International Travel</option>
                                    <option {{ $covidtracker->query_type == "Local Travel"? 'selected' : '' }} value='Local Travel'>Local Travel</option>
                                    <option {{ $covidtracker->query_type == "Lockdown Restrictions"? 'selected' : '' }} value='Lockdown Restrictions'>Lockdown Restrictions</option>
                                    <option {{ $covidtracker->query_type == "MCTT Pass"? 'selected' : '' }} value='MCTT Pass'>MCTT Pass</option>
                                    <option {{ $covidtracker->query_type == "MoH Pass"? 'selected' : '' }} value='MoH Pass'>MoH Pass</option>
                                    <option {{ $covidtracker->query_type == "Other Health"? 'selected' : '' }} value='Other Health'>Other Health</option>
                                    <option {{ $covidtracker->query_type == "Screening Clinic"? 'selected' : '' }} value='Screening Clinic'>Screening Clinic</option>
                                    <option {{ $covidtracker->query_type == "Swab Test Request"? 'selected' : '' }} value='Swab Test Request'>Swab Test Request</option>
                                    <option {{ $covidtracker->query_type == "Swab Test Results"? 'selected' : '' }} value='Swab Test Results'>Swab Test Results</option>
                                    <option {{ $covidtracker->query_type == "Vaccination Registration"? 'selected' : '' }} value='Vaccination Registration'>Vaccination Registration</option>
                                    <option {{ $covidtracker->query_type == "Vaccination Sites"? 'selected' : '' }} value='Vaccination Sites'>Vaccination Sites</option>
                                    <option {{ $covidtracker->query_type == "Vaccination Visits "? 'selected' : '' }} value='Vaccination Visits '>Vaccination Visits </option>


                                </select>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- @can('qa_access')
            <div class="col-4">
                <div class="card card-success">
                    <div class="card-header" >
                        <strong>QA Call Record # {{ $covidtracker->id }}</strong>
        </div>

        <div class="card-body">
            @if(is_null($covidtracker->qa_call_tracker_id))
            <form action="{{ route('admin.qacalltracker.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @else
                <div class="row">
                    <div class="col-12">
                        <p><strong>QA Agent:</strong><span style="font-style:italic; color:crimson; font-weight:900;" class="pl-4">{{ $covidtracker->calltrackerQA->qa_name }}({{ $covidtracker->calltrackerQA->qa_code }}) on {{ $covidtracker->calltrackerQA->created_at }}</span></p>
                    </div>
                </div>
                <form action="{{ route('admin.qacalltracker.update', [$covidtracker->qa_call_tracker_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @endif
                    <input type="hidden" name="covidtracker_id" value="{{$covidtracker->id ?? null }}">
                    <input type="hidden" name="tracker" value="helpdesk">
                    <div class="form-group row s1a">
                        <label data-toggle="tooltip" title="Select Call Status" for="call_status" class="col-md-4 col-form-label text-md-left">Call Status:</label>

                        <div class="col-md-8">
                            <select class="form-control select2" name="call_status" data-width="100%" id="call_status">
                                <option value="">Select a call status</option>
                                <option {{ !(is_null($covidtracker->calltrackerQA)) && $covidtracker->calltrackerQA->call_status == 'Complete' ? 'selected' : '' }} value="Complete">Complete</option>
                                <option {{ !(is_null($covidtracker->calltrackerQA)) && $covidtracker->calltrackerQA->call_status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row s1a">
                        <label data-toggle="tooltip" title="Select QA Status" for="qa_status" class="col-md-4 col-form-label text-md-left">QA Status:</label>

                        <div class="col-md-8">
                            <select class="form-control select2" name="qa_status" data-width="100%" id="qa_status">
                                <option value="">Select a qa status</option>
                                <option {{ isset($covidtracker->calltrackerQA) && $covidtracker->calltrackerQA->qa_status == 'Compliant' ? 'selected' : '' }} value="Compliant">Compliant</option>
                                <option {{ isset($covidtracker->calltrackerQA) && $covidtracker->calltrackerQA->qa_status == 'Non-Compliant' ? 'selected' : '' }} value="Non-Compliant">Non-Compliant</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row s1a">
                        <label data-toggle="tooltip" title="Select QA Outcome" for="qa_outcome" class="col-md-4 col-form-label text-md-left">QA Outcome:</label>

                        <div class="col-md-8">
                            <select class="form-control select2" name="qa_outcome" data-width="100%" id="qa_outcome">
                                <option value="">Select a qa outcome</option>
                                <option {{ isset($covidtracker->calltrackerQA) && $covidtracker->calltrackerQA->qa_outcome == "Call Management" ? 'selected' : '' }} value="Call Management">Call Management</option>
                                <option {{ isset($covidtracker->calltrackerQA) && $covidtracker->calltrackerQA->qa_outcome == "Compliant Call" ? 'selected' : '' }} value="Compliant Call">Compliant Call</option>
                                <option {{ isset($covidtracker->calltrackerQA) && $covidtracker->calltrackerQA->qa_outcome == "Customer Focus"  ? 'selected' : '' }} value="Customer Focus">Customer Focus</option>
                                <option {{ isset($covidtracker->calltrackerQA) && $covidtracker->calltrackerQA->qa_outcome == "Process and Procedures" ? 'selected' : '' }} value="Process and Procedures">Process and Procedures</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row s2">
                        <label data-toggle="tooltip" title="You must enter details" for="qa_comments" class="col-md-4 col-form-label text-md-left">QA Comments:</label>

                        <div class="col-md-8">
                            <textarea style="height:200px;" id="qa_comments" type="text" class="form-control" name="qa_comments" value="" autofocus>{{ $covidtracker->calltrackerQA->qa_comments ?? null }}</textarea>
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
        $("#call_date").datepicker();

        // //Timepicker
        var startTime = $('#call-timepicker').datetimepicker({
            format: 'HH:mm:ss'
        , });

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $('#opening_date').datepicker({
            format: 'yyyy-mm-dd'
        , });

        $('#sub_category').on('select2:select', function(e) {
            var data = e.params.data;
            sub_category_handler(data.id);
        });

        function sub_category_handler(subcategory) {
            if (subcategory == "Enquiry") {
                $("#enquiry-section").show();
                $("#escalations-section").hide();
                $("#complaints-section").hide();
            }

            if (subcategory == "Escalations") {
                $("#enquiry-section").hide();
                $("#escalations-section").show();
                $("#complaints-section").hide();
            }

            if (subcategory == "Complaints") {
                $("#enquiry-section").hide();
                $("#escalations-section").hide();
                $("#complaints-section").show();
            }

            if (subcategory == "") {
                $("#enquiry-section").hide();
                $("#escalations-section").hide();
                $("#complaints-section").hide();
            }
        }

        $(".symptoms").on('change', function(e) {
            e.preventDefault();
            symptomsStringy();
        });

        function symptomsStringy() {
            var symptoms = $('.symptoms:checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            $("#symptomsInput").val(symptoms.toString());
        }

        function selectSymptoms() {
            var symptoms = $("#symptomsInput").val();
            $('.symptoms').map(function(index) {
                let re = new RegExp($(this).val(), 'g')
                const found = symptoms.match(re);

                if (Array.isArray(found) && found.length !== 0) {
                    $(this).attr("checked", "checked");
                }
            });
        }

        setTimeout(selectSymptoms, 50);


    });

</script>
@endsection
