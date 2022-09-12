@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Marketing Tracker Entry</h1>
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
                        <h4>Marketing Tracker Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{route('admin.marketingtracker.store')}}">
                            @csrf
                            <hr>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What is the escalation type?" for="marketing_type" class="col-md-2 col-form-label text-md-left">Marketing Type: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="marketing_type" data-width="100%" id="marketing_type">
                                        <option value="" > -- select type -- </option>
                                        <option value='Machine Price Update' selected>Machine Price Update</option>
										<option value='SKU Swap Reck Number'>SKU Swap Reck Number</option>										
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in Order number" for="brand" class="col-md-2 col-form-label text-md-left">Brand:</label>
                                <div class="col-md-10">
                                    <input id="brand" type="text" value="" class="form-control" name="brand" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Please type in Customer name" for="sku" class="col-md-2 col-form-label text-md-left">SKU:</label>

                                <div class="col-md-10">
                                    <input id="sku" type="text" value="" class="form-control" name="sku" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="old_price" data-toggle="tooltip" title="Any updates or comments? " for="old_price" class="col-md-2 col-form-label text-md-left">Old Price:</label>
                                <div class="col-md-10">
                                    <input id="old_price" type="text" value="" class="form-control" name="old_price" required autocomplete="title">
                                </div>

                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Any updates or comments? " for="new_price" class="col-md-2 col-form-label text-md-left">New Price:</label>
                                <div class="col-md-10">
                                    <input id="new_price" type="text" value="" class="form-control" name="new_price" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Any updates or comments? " for="agent_remarks" class="col-md-2 col-form-label text-md-left">Agents Remarks:</label>

                                <div class="col-md-10">
                                    <textarea id="agent_remarks" name="agent_remarks" class="form-control"></textarea>

                                </div>
                            </div>

                            <div class="form-group row mb-0 save">

                                <div class="col-md-6 ">
                                    <button type="submit" id="sales-tracker-submit" class="btn btn-primary pull-right">
                                        Save
                                    </button>
                                    {{-- <input id="sales-tracker-submit" class="btn btn-primary pull-right" type="submit"  onclick="this.disabled=true; this.value='Saving, please wait...';this.form.submit();" value="Save" /> --}}
                                </div>
                                <!--
                                <div class="col-md-6 ">
                                    <button type="" id="" class="btn btn-primary pull-right">
                                        Save

                                        <a href="{{ route('admin.marketingtracker.index') }}"></a>
                                    </button>

                                </div>
-->
                        </form>
                        <br>

                        <!--        <a href="{{ route('admin.marketingtracker.store') }}">   <button type="" id="" class="btn btn-primary pull-right">
                    Save </button> </a>  -->

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
        $("#esc_date").datepicker();

        // //Timepicker
        /*
        var startTime = $('#time_received').datetimepicker({
            format: 'HH:mm:ss'
            , useCurrent: true
        });
        */

        //Initialize Select2 Elements
        $('.select2').select2();


    });

</script>
@endsection
