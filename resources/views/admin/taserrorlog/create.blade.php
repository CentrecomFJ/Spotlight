@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create TAS Error Log Entry</h1>
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
                        <h4>TAS Error Log Entry Form</h4>

                    </div>
                    <div class="card-body">
                        <form id="rex-tracker-form" method="POST" action="{{ route('admin.taserrorlog.store') }}">
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
                                        <option value="" selected> -- select agent -- </option>
                                        <option value='Alumeci Delaibatiki'>Alumeci Delaibatiki</option>
                                        <option value='Anaseini Tuivaga'>Anaseini Tuivaga</option>
                                        <option value='Asena Bale'>Asena Bale</option>
                                        <option value='Birisita Tamani'>Birisita Tamani</option>
                                        <option value='Devika Nadan'>Devika Nadan</option>
                                        <option value='Fiona Lord'>Fiona Lord</option>
                                        <option value='Leilani Aditalebulamainiusiladi'>Leilani Aditalebulamainiusiladi</option>
                                        <option value='Mele Turaganivalu'>Mele Turaganivalu</option>
                                        <option value='Ruci Karikaritu'>Ruci Karikaritu</option>
                                        <option value='Sainimili Koroivueti'>Sainimili Koroivueti</option>
                                        <option value='Thomas Waqairawai'>Thomas Waqairawai</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the error sourced?" for="booking_ref" class="col-md-2 col-form-label text-md-left">Booking Reference: </label>

                                <div class="col-md-10">
                                    <input id="booking_ref" type="text" value="" class="form-control" name="booking_ref" autocomplete="title" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="Where is the error sourced?" for="err_category" class="col-md-2 col-form-label text-md-left">Error Category: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="err_category" data-width="100%" id="err_category">
                                        <option value="" selected> -- select category -- </option>
                                        <option value='Baggage'>Baggage</option>
                                        <option value='Fare-Quote'>Fare Quote</option>
                                        <option value='New-Booking'>New Booking</option>
                                        <option value='Travel-Information'>Travel Information</option>
                                        <option value='Rebooking'>Rebooking</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="What is the error definition?" for="err_definition" class="col-md-2 col-form-label text-md-left">Error Definition: </label>

                                <div class="col-md-10">
                                    <select class="form-control select2" name="err_definition" data-width="100%" id="err_definition" style="display:none;">
                                        <!--
                                        <option value='Incorrect baggage fee' class="err-def-baggage">Incorrect baggage fee</option>
                                        <option value='Incorrect baggage allowance' class="err-def-baggage">Incorrect baggage allowance</option>

                                        <option value='Incorrect flight segments' class="err-def-newbooking">Incorrect flight segments</option>
                                        <option value='Incorrect contact details' class="err-def-newbooking">Incorrect contact details</option>

                                        <option value='Incorrect visa information' class="err-def-travelinfo">Incorrect visa information</option>
                                        <option value='Incorrect COVID Restrictions advice' class="err-def-travelinfo">Incorrect COVID Restrictions advice</option>

                                        <option value='Incorrect change fee' class="err-def-rebooking">Incorrect change fee</option>
                                        <option value='Incorrect fare difference' class="err-def-rebooking">Incorrect fare difference</option>
                                        <option value='Incorrect flight segments booked' class="err-def-rebooking">Incorrect flight segments booked</option>
                                        <option value='Incorrect upgrade' class="err-def-rebooking">Incorrect upgrade</option>
                                        <option value='Incomplete reissue' class="err-def-rebooking">Incomplete reissue</option>
-->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-placement="bottom" data-toggle="tooltip" title="Comments" for="comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

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
    var definition_data = {
        "Baggage": ["Incorrect baggage fee", "Incorrect baggage allowance"]
        , "New-Booking": ["Incorrect flight segments", "Incorrect contact details"]
        , "Travel-Information": ["Incorrect visa information", "Incorrect COVID Restrictions advice"]
        , "Rebooking": ["Incorrect change fee", "Incorrect fare difference", "Incorrect flight segments booked", "Incorrect upgrade", "Incomplete reissue"]

    }
    var Select2Cascade = (function(window, $) {

        function Select2Cascade(parent, child, data, select2Options) {
            var afterActions = [];
            var options = select2Options || {};

            // Register functions to be called after cascading data loading done
            this.then = function(callback) {
                afterActions.push(callback);
                return this;
            };

            parent.select2(select2Options).on("change", function(e) {

                child.prop("disabled", true);

                var _this = this;
                var def_val = $(this).val();
                var items = data[def_val];

                var newOptions;
                if (items !== undefined) {

                    newOptions = '<option value="">-- select definition --</option>';
                    for (var id in items) {
                        newOptions += '<option value="' + items[id] + '">' + items[id] + '</option>';
                    }
                } else {
                    newOptions = '<option value="" disabled>-- no definition --</option>';
                }

                child.select2('destroy').html(newOptions).prop("disabled", false)
                    .select2(options);

                afterActions.forEach(function(callback) {
                    callback(parent, child, items);
                });
            });
        }

        return Select2Cascade;

    })(window, $);

    $(document).ready(function() {
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $("#entry_date").datepicker();

        var select2Options = {
            width: 'resolve'
        };

        //Initialize Select2 Elements
        $('select').select2(select2Options);
        var cascadLoading = new Select2Cascade($('#err_category'), $('#err_definition'), definition_data, select2Options);
        cascadLoading.then(function(parent, child, items) {
            // Dump response data
            console.log(items);
        });


        $('#err_definition').on("select2:select", function(e) {
            var value = e.params.data;
            console.log(value);
        });
    });

</script>
@endsection
