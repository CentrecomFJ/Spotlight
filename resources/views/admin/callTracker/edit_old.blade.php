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
                        <strong>{{ trans('global.edit') }} Call Record # {{ $calltracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.calltracker.update', [$calltracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$calltracker->id ?? null }}"> </input>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Click on the calender button to select a date , do not type it in" for="date" class="col-md-4 col-form-label text-md-left">Call Stats Date:</label>

                                <div class="col-md-6">
                                    <input id="opening_date" type="text" value="{{$calltracker->call_stats_date ?? null }}" class="form-control" name="call_stats_date" required autocomplete="title" autofocus>


                                </div>
                            </div>


                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Fill in the time when you received the call." for="time" class="col-md-4 col-form-label text-md-left">Time:</label>

                                <div class="col-md-6">
                                    <input id="time" type="number" min="0" max="24" step="0.01" value="{{$calltracker->time ?? null }}" class="form-control" name="time" required autocomplete="title" autofocus>


                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="what was the length of the call ?" for="length_of_call" class="col-md-4 col-form-label text-md-left">Length Of Call:</label>

                                <div class="col-md-6">
                                    <input id="length_of_call" type="number" min="0" step="0.01" value="{{$calltracker->length_of_call ?? null }}" class="form-control" name="length_of_call" required autocomplete="title" autofocus>


                                </div>
                            </div>


                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter a parties number." for="parties" class="col-md-4 col-form-label text-md-left">Parties:</label>

                                <div class="col-md-6">
                                    <input id="parties" type="text" class="form-control" name="parties" value="{{$calltracker->parties ?? null }}" required autocomplete="parties" autofocus>

                                </div>
                            </div>


                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="skills" class="col-md-4 col-form-label text-md-left">Direction</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="direction" data-width="100%" id="direction">

                                        <option {{ "incoming_call"== $calltracker->direction ? "selected" : "" }} value="incoming_call">Incoming Call</option>
                                        <option {{ "outgoing_call"== $calltracker->direction ? "selected" : "" }} value="outgoing_call">Outgoing Call</option>


                                    </select>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="skills" class="col-md-4 col-form-label text-md-left">Skills</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="skills" data-width="100%" id="skills">
                                        <option value="">Select a option</option>

                                        <option {{ "LMR_Government"== $calltracker->skills ? "selected" : "" }} value=LMR_Government">LMR_Government</option>
                                        <option {{ "LMR_Public"== $calltracker->skills ? "selected" : "" }} value="LMR_Public">LMR_Public</option>

                                    </select>

                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="category" class="col-md-4 col-form-label text-md-left">Category</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="category" data-width="100%" id="category">
                                        <option value="">Select a category</option>
                                        <option {{ "Accounts"== $calltracker->category ? "selected" : "" }} value="Accounts">Accounts</option>
                                        <option {{ "Lands"== $calltracker->category ? "selected" : "" }} value="Lands">Lands</option>
                                        <option {{ "Valuations"== $calltracker->category ? "selected" : "" }} value="Valuations">Valuations</option>
                                        <option {{ "Survey"== $calltracker->category ? "selected" : "" }} value="Survey">Survey</option>
                                        <option {{ "General"== $calltracker->category ? "selected" : "" }} value="General">General</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row s2">
                                <label data-toggle="tooltip" title="You must enter details" for="details" class="col-md-4 col-form-label text-md-left">Details:</label>

                                <div class="col-md-6">
                                    <textarea style="height:200px;" id="details" type="text" class="form-control" name="details" required autocomplete="reason" autofocus>{{$calltracker->details ?? null }}</textarea>

                                </div>
                            </div>



                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="call_type" class="col-md-4 col-form-label text-md-left">Call type</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="call_type" data-width="100%" id="call_type">
                                        <option value="">Select call type</option>

                                        <option {{ "Lease_Application"== $calltracker->call_type ? "selected" : "" }} value="Lease_Application">Lease Application</option>
                                        <option {{ "Survey_Instruction"== $calltracker->call_type ? "selected" : "" }} value="Survey_Instruction">Survey Instruction</option>

                                    </select>

                                </div>
                            </div>


                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="support_level" class="col-md-4 col-form-label text-md-left">Support Level</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="support_level" data-width="100%" id="support_level">
                                        <option value="3">Select support level</option>

                                        <option {{ "L1"== $calltracker->support_level ? "selected" : "" }} value="L1">L1</option>
                                        <option {{ "L2"== $calltracker->support_level ? "selected" : "" }} value="L2">L2</option>

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


                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>

    $('#opening_date').datepicker({
            format: 'yyyy-mm-dd',
        });

    $('#status').on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data);
        if (data.id == "Extended") {
            $("#extended-div").show();
        } else {
            $("#extended-div").hide();
        }
    });
</script>
@endsection