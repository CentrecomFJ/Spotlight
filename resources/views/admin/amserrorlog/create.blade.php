@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create AMS Error Log Entry</h1>
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
                        <h4>AMS Error Log Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{ route('admin.amserrorlog.store') }}">
                            @csrf
                            <hr>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Date Received" for="entry_date" class="col-md-2 col-form-label text-md-left">Date:</label>

                                <div class="col-md-10">

                                    <div class="input-group date" data-provide="datepicker">
                                        <input id="entry_date" type="text" class="form-control" name="entry_date" value="{{ date('Y-m-d') ?? '' }}">
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
                                        {{-- <option value='Brett Underwood'>Brett Underwood</option> --}}
                                        <option value='Fuefue Laveti'>Fuefue Laveti</option>
                                        <option value='Shriya Abinash'>Shriya Abinash</option>
                                        <option value='Jese Waqanibaravi'>Jese Waqanibaravi</option>
                                        {{-- <option value='Kiniviliame Turagalailai'>Kiniviliame Turagalailai</option> --}}
                                        <option value='Mosese Veilesiyaki'>Mosese Veilesiyaki</option>
                                        {{-- <option value='Nadine Philitoga'>Nadine Philitoga</option> --}}
                                        <option value='Nathan Wesley'>Nathan Wesley</option>
                                        <option value='Nicholas Tailau'>Nicholas Tailau</option>
                                        {{-- <option value='Timoci Batibasaga'>Timoci Batibasaga</option> --}}

                                        <option value='Ratu Varani'>Ratu Varani</option>
                                        <option value='Samuela Waqatoga'>Samuela Waqatoga</option>
                                        <option value='Nelson Artack'>Nelson Artack</option>
                                        <option value='Jotame Talebula'>Jotame Talebula</option>


                                    </select>
                                </div>
                            </div>


                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the error sourced?" for="source" class="col-md-2 col-form-label text-md-left">Error Source: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="source" data-width="100%" id="source">
                                        <option value="" selected> -- select source -- </option>
                                        <option value='Call'>Call</option>
                                        <option value='Email'>Email</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Whhat is the error type?" for="type" class="col-md-2 col-form-label text-md-left">Error Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="type" data-width="100%" id="type">
                                        <option value="" selected> -- select type -- </option>
                                        <option value='process not adhered to'>process not adhered to</option>
                                        <option value='wrong information given'>wrong information given</option>
                                        <option value='incorrect template used'>incorrect template used</option>
                                        <option value='incorrect email recipient'>incorrect email recipient</option>

                                        <option value='incorrect email response'>incorrect email response</option>
                                        <option value='checklist not followed'>checklist not followed</option>

                                        <option value='No CRM Records (Calls)'>No CRM Records (Calls)</option>
                                        <option value='No CRM Records (Emails)'>No CRM Records (Emails)</option>
                                        <option value='Website Discrepency'>Website Discrepency</option>
                                        <option value='Magento Discrepency '>Magento Discrepency </option>
                                        <option value='No Magento Notes'>No Magento Notes</option>
                                        <option value='Magento Lags'>Magento Lags</option>
                                        <option value='Warehouse/ Supplier Delay'>Warehouse/ Supplier Delay</option>
                                        <option value='Lack of Communication Skills'>Lack of Communication Skills </option>
                                        <option value='Lack of Soft Skills'>Lack of Soft Skills </option>
                                        <option value='Lack of Call Management'>Lack of Call Management </option>
                                        <option value='Emails sent more than two hours after the initial contact'>Emails sent more than two hours after the initial contact</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the complaint sourced?" for="complaint_src" class="col-md-2 col-form-label text-md-left">Complaint Source: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="complaint_src" data-width="100%" id="complaint_src">
                                        <option value="" selected> -- select complaint source -- </option>
                                        <option value='Customer'>Customer</option>
                                        <option value='Client'>Client</option>
                                        <option value='QA'>QA</option>
                                        <option value='Trainer'>Trainer</option>
                                        <option value='TL'>TL</option>
                                        <option value='Agent'>Agent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the complaint sourced?" for="impact_level" class="col-md-2 col-form-label text-md-left">Business/Financial Impact Level: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="impact_level" data-width="100%" id="impact_level">
                                        <option value="" selected> -- select impact level -- </option>
                                        <option value='High'>High</option>
                                        <option value='Medium'>Medium</option>
                                        <option value='Low'>Low</option>
                                        <option value='None'>None</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Supervisor comments" for="comments" class="col-md-2 col-form-label text-md-left">Supervisior Comments:</label>

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
        $("#entry_date").datepicker();

        // //Timepicker
        /*var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });*/
        //Initialize Select2 Elements
        $('.select2').select2();


    });

</script>
@endsection
