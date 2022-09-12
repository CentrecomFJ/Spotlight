@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Call Entry</h1>
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
                    <div class="card-header" style="color:white;background:#91c556;">
                        <h4>Call Entry Form </h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" style="min-height:300px;" id="sales-tracker-form" action="{{ route('admin.calltracker.store') }}">
                            @csrf

                            {{--work area start--}}

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Click on the calender button to select a date , do not type it in" for="date" class="col-md-4 col-form-label text-md-left">Call Stats Date:</label>

                                <div class="col-md-6">
                                    <input id="opening_date" type="text" value="{{ date('Y-m-d') }}" class="form-control" name="call_stats_date" required autocomplete="title" autofocus>
                                </div>
                            </div>


                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Fill in the time when you received the call." for="time" class="col-md-4 col-form-label text-md-left">Time:</label>

                                <div class="col-md-6">
                                    <input id="time" type="number" min="0" max="24" step="0.01" value="11.00" class="form-control" name="time" required autocomplete="title" autofocus>


                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="what was the length of the call ?" for="length_of_call" class="col-md-4 col-form-label text-md-left">Length Of Call:</label>

                                <div class="col-md-6">
                                    <input id="length_of_call" type="number" min="0" step="0.01" value="0.00" class="form-control" name="length_of_call" required autocomplete="title" autofocus>


                                </div>
                            </div>


                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter a parties number." for="parties" class="col-md-4 col-form-label text-md-left">Parties:</label>

                                <div class="col-md-6">
                                    <input id="parties" type="text" class="form-control" name="parties" value="" required autocomplete="parties" autofocus>

                                </div>
                            </div>





                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="skills" class="col-md-4 col-form-label text-md-left">Direction</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="direction" data-width="100%" id="direction">
                                    <option value="">Select a direction</option>
                                        <option value="incoming_call">Incoming Call</option>
                                        <option value="outgoing_call">Outgoing Call</option>
                                    </select>

                                </div>
                            </div>




                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="skills" class="col-md-4 col-form-label text-md-left">Skills</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="skills" data-width="100%" id="skills">
                                        <option value="">Select a skills</option>

                                        <option value="LMR_Government">LMR_Government</option>
                                        <option value="LMR_Public">LMR_Public</option>

                                    </select>

                                </div>
                            </div>



                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="category" class="col-md-4 col-form-label text-md-left">Category</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="category" data-width="100%" id="category">
                                        <option value="">Select a category</option>
                                        <option value="Accounts">Accounts</option>
                                        <option value="Lands">Lands</option>
                                        <option value="Valuations">Valuations</option>
                                        <option value="Survey">Survey</option>
                                        <option value="General">General</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter details" for="details" class="col-md-4 col-form-label text-md-left">Details:</label>

                                <div class="col-md-6">
                                    <textarea style="height:200px;" id="details" type="text" class="form-control" name="details" value="" required autocomplete="reason" autofocus></textarea>

                                </div>
                            </div>



                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="call_type" class="col-md-4 col-form-label text-md-left">Call type</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="call_type" data-width="100%" id="call_type">
                                        <option value="">Select call type</option>
                                        <option value="Lease_Application">Lease Application</option>
                                        <option value="Survey_Instruction">Survey Instruction</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="support_level" class="col-md-4 col-form-label text-md-left">Support Level</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="support_level" data-width="100%" id="support_level">
                                        <option value="">Select support level</option>

                                        <option value="L1">L1</option>
                                        <option value="L2">L2</option>



                                    </select>

                                </div>
                            </div>




                            <hr>
                            <p>Make sure to check your work before hitting save</p>

                            <div class="form-group row mb-0 save">
                                <label for="confirmation" class="col-md-4 col-form-label text-md-left">Confirmation: *</label>

                                <div class="col-md-6">
                                    <input type="checkbox" id="confirm" name="confirm" value="1">
                                    <label for="confirm"> I have read and confirm that the above entry is correct. </label><br>
                                    <div style="display:none;" class="mb-5" id="qrcode"></div>

                                </div>
                            </div>


                            <div class="form-group row mb-0 save">

                                <div class="col-md-6 ">
                                    <button type="submit" id="sales-tracker-submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</script>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $('#opening_date').datepicker({
            format: 'yyyy-mm-dd',
        });

        // //Date range picker
        // $('#reservationdate').datetimepicker({
        //     format: 'L'
        // });

        $('#status').on('select2:select', function(e) {
            var data = e.params.data;
            console.log(data);
            if (data.id == "Extended") {
                $("#extended-div").show();
            } else {
                $("#extended-div").hide();
            }
        });
    });
</script>
@endsection