@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit AMS Error Log Record</h1>
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
                        <strong>{{ trans('global.edit') }} AMS Error Log Record # {{ $amserrorlog->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form id="moh-tracker-form" action="{{ route('admin.amserrorlog.update', [$amserrorlog->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$amserrorlog->id ?? null }}">

                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Date Received" for="entry_date" class="col-md-2 col-form-label text-md-left">Date:</label>

                                <div class="col-md-10">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input id="entry_date" type="text" class="form-control" name="entry_date" value="{{ $amserrorlog->entry_date }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Choose Agent" for="agent_name" class="col-md-2 col-form-label text-md-left">Agent Name: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="agent_name" data-width="100%" id="agent_name">
                                        <option value="" selected> -- select agent -- </option>
                                        {{-- <option {{ $amserrorlog->agent_name == "Brett Underwood" ? "selected" : ""}} value='Brett Underwood'>Brett Underwood</option> --}}
                                        <option {{ $amserrorlog->agent_name == "Fuefue Laveti" ? "selected" : ""}} value='Fuefue Laveti'>Fuefue Laveti</option>
                                        <option {{ $amserrorlog->agent_name == "Shriya Abinash" ? "selected" : ""}} value='Shriya Abinash'>Shriya Abinash</option>
                                        <option {{ $amserrorlog->agent_name == "Jese Waqanibaravi" ? "selected" : ""}} value='Jese Waqanibaravi'>Jese Waqanibaravi</option>
                                        {{-- <option {{ $amserrorlog->agent_name == "Kiniviliame Turagalailai" ? "selected" : ""}} value='Kiniviliame Turagalailai'>Kiniviliame Turagalailai</option> --}}
                                        <option {{ $amserrorlog->agent_name == "Mosese Veilesiyaki" ? "selected" : ""}} value='Mosese Veilesiyaki'>Mosese Veilesiyaki</option>
                                        {{-- <option {{ $amserrorlog->agent_name == "Nadine Philitoga" ? "selected" : ""}} value='Nadine Philitoga'>Nadine Philitoga</option> --}}
                                        <option {{ $amserrorlog->agent_name == "Nathan Wesley" ? "selected" : ""}} value='Nathan Wesley'>Nathan Wesley</option>
                                        <option {{ $amserrorlog->agent_name == "Nicholas Tailau" ? "selected" : ""}} value='Nicholas Tailau'>Nicholas Tailau</option>
                                        {{-- <option {{ $amserrorlog->agent_name == "Timoci Batibasaga" ? "selected" : ""}} value='Timoci Batibasaga'>Timoci Batibasaga</option> --}}

                                        <option {{ $amserrorlog->agent_name == "Ratu Varani" ? "selected" : ""}} value='Ratu Varani'>Ratu Varani</option>
                                        <option {{ $amserrorlog->agent_name == "Samuela Waqatoga" ? "selected" : ""}} value='Samuela Waqatoga'>Samuela Waqatoga</option>
                                        <option {{ $amserrorlog->agent_name == "Nelson Artack" ? "selected" : ""}} value='Nelson Artack'>Nelson Artack</option>
                                        <option {{ $amserrorlog->agent_name == "Jotame Talebula" ? "selected" : ""}} value='Jotame Talebula'>Jotame Talebula</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the error sourced?" for="source" class="col-md-2 col-form-label text-md-left">Error Source: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="source" data-width="100%" id="source">
                                        <option value="" selected> -- select source -- </option>
                                        <option {{ $amserrorlog->source == "Call" ? "selected" : ""}} value='Call'>Call</option>
                                        <option {{ $amserrorlog->source == "Email" ? "selected" : ""}} value='Email'>Email</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Whhat is the error type?" for="type" class="col-md-2 col-form-label text-md-left">Error Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="type" data-width="100%" id="type">
                                        <option value="" selected> -- select type -- </option>
                                        <option {{ $amserrorlog->type == "process not adhered to" ? "selected" : ""}} value='process not adhered to'>process not adhered to</option>
                                        <option {{ $amserrorlog->type == "wrong information given" ? "selected" : ""}} value='wrong information given'>wrong information given</option>
                                        <option {{ $amserrorlog->type == "incorrect template used" ? "selected" : ""}} value='incorrect template used'>incorrect template used</option>
                                        <option {{ $amserrorlog->type == "incorrect email recipient" ? "selected" : ""}} value='incorrect email recipient'>incorrect email recipient</option>

                                        <option {{ $amserrorlog->type == "incorrect email response" ? "selected" : ""}} value='incorrect email response'>incorrect email response</option>
                                        <option {{ $amserrorlog->type == "checklist not followed" ? "selected" : ""}} value='checklist not followed'>checklist not followed</option>

                                        <option {{ $amserrorlog->type == "No CRM Records (Calls)" ? "selected" : ""}} value='No CRM Records (Calls)'>No CRM Records (Calls)</option>
                                        <option {{ $amserrorlog->type == "No CRM Records (Emails)" ? "selected" : ""}} value='No CRM Records (Emails)'>No CRM Records (Emails)</option>
                                        <option {{ $amserrorlog->type == "Website Discrepency" ? "selected" : ""}} value='Website Discrepency'>Website Discrepency</option>
                                        <option {{ $amserrorlog->type == "Magento Discrepency" ? "selected" : ""}} value='Magento Discrepency'>Magento Discrepency </option>
                                        <option {{ $amserrorlog->type == "No Magento Notes" ? "selected" : ""}} value='No Magento Notes'>No Magento Notes</option>
                                        <option {{ $amserrorlog->type == "Magento Lags" ? "selected" : ""}} value='Magento Lags'>Magento Lags</option>
                                        <option {{ $amserrorlog->type == "Warehouse/ Supplier Delay" ? "selected" : ""}} value='Warehouse/ Supplier Delay'>Warehouse/ Supplier Delay</option>
                                        <option {{ $amserrorlog->type == "Lack of Communication Skills" ? "selected" : ""}} value='Lack of Communication Skills'>Lack of Communication Skills </option>
                                        <option {{ $amserrorlog->type == "Lack of Soft Skills" ? "selected" : ""}} value='Lack of Soft Skills'>Lack of Soft Skills </option>
                                        <option {{ $amserrorlog->type == "Lack of Call Management" ? "selected" : ""}} value='Lack of Call Management'>Lack of Call Management </option>
                                        <option {{ $amserrorlog->type == "Emails sent more than two hours after the initial contact" ? "selected" : ""}} value='Emails sent more than two hours after the initial contact'>Emails sent more than two hours after the initial contact</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the complaint sourced?" for="complaint_src" class="col-md-2 col-form-label text-md-left">Complaint Source: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="complaint_src" data-width="100%" id="complaint_src">
                                        <option value="" selected> -- select complaint source -- </option>
                                        <option {{ $amserrorlog->complaint_src == "Customer" ? "selected" : ""}} value='Customer'>Customer</option>
                                        <option {{ $amserrorlog->complaint_src == "Client" ? "selected" : ""}} value='Client'>Client</option>
                                        <option {{ $amserrorlog->complaint_src == "QA" ? "selected" : ""}} value='QA'>QA</option>
                                        <option {{ $amserrorlog->complaint_src == "Trainer" ? "selected" : ""}} value='Trainer'>Trainer</option>
                                        <option {{ $amserrorlog->complaint_src == "TL" ? "selected" : ""}} value='TL'>TL</option>
                                        <option {{ $amserrorlog->complaint_src == "Agent" ? "selected" : ""}} value='Agent'>Agent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the complaint sourced?" for="impact_level" class="col-md-2 col-form-label text-md-left">Business/Financial Impact Level: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="impact_level" data-width="100%" id="impact_level">
                                        <option value="" selected> -- select impact level -- </option>
                                        <option {{ $amserrorlog->impact_level == "High" ? "selected" : ""}} value='High'>High</option>
                                        <option {{ $amserrorlog->impact_level == "Medium" ? "selected" : ""}} value='Medium'>Medium</option>
                                        <option {{ $amserrorlog->impact_level == "Low" ? "selected" : ""}} value='Low'>Low</option>
                                        <option {{ $amserrorlog->impact_level == "None" ? "selected" : ""}} value='None'>None</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Supervisor comments" for="comments" class="col-md-2 col-form-label text-md-left">Supervisior Comments:</label>

                                <div class="col-md-10">
                                    <textarea id="comments" name="comments" class="form-control">{{ $amserrorlog->comments }}</textarea>

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
        /*
        var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });
        */
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

    });

</script>
@endsection
