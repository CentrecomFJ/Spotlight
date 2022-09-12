@extends('layouts.adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>M2M Curtain Market Research</h1>
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
                <div class="col-12">
                    <div class="card card-info elevation-3">

                        <div class="card-header">
                            <strong>Survey Entry Form</strong>
                        </div>

                        <div class="row">
                            <div class="callout callout-info m-3 col-8 text-primary">
                                <h4>Script</h4>

                                <h4>Introduction</h4>
                                <p>
                                    Good Morning/Afternoon/Evening, this is<strong> {{ Auth::user()->name }}</strong>
                                    calling on behalf of Spotlight, for a confidential survey regarding your opinion and
                                    feedbacks on our products and services. We are only interested in understanding your
                                    opinions and views as this will improve on all our future updates, features and new
                                    products.
                                    Can you help me with these now, we would really appreciate your feedback?</p>

                                <p>(If Necessary) The Survey will take between 5 - 8minutes to complete depending on your
                                    answers.
                                    Is now a good time or would it be convenient if I make an appointment to call you back
                                    at another time?</p>
                                <p>If ok/Yes or Affirmative response:
                                    Thank you</p>


                                <p>If not ok or Not affirmative
                                    May I call you at another time</p>

                                <p>If No;
                                    Understood, Thank you for your time, goodbye</p>
                                <p>
                                    Outro:
                                    That's the end of the interview as this is research, it is carried out with compliance.
                                    The information you provided will be used for research purposes only and thank you very
                                    much for your help.
                                </p>
                            </div>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.m2mcurtain.update', [$m2mcurtain->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mt-4">
                                    <div class="form-group col-4">
                                        <label for="division">Division</label>
                                        <input type="text" id="division" name="division" class="form-control"
                                            value="{{ $m2mcurtain->division ?? null }}" readonly>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="business_unit">Business Unit</label>
                                        <input type="text" id="business_unit" name="business_unit" class="form-control"
                                            value="{{ $m2mcurtain->business_unit ?? null }}" readonly>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="representative">Representative</label>
                                        <input type="text" id="representative" name="representative" class="form-control"
                                            value="{{ $m2mcurtain->representative ?? null }}" readonly>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="contact_name">Contact</label>
                                        <input type="text" id="contact_name" name="contact_name" class="form-control"
                                            value="{{ $m2mcurtain->contact_name ?? null }}" readonly>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="phone_num">Phone Number</label>
                                        <input type="text" id="phone_num" name="phone_num" class="form-control"
                                            value="{{ $m2mcurtain->phone_num ?? null }}" readonly>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="surburb">Surburb</label>
                                        <input type="text" id="surburb" name="surburb" class="form-control"
                                            value="{{ $m2mcurtain->surburb ?? null }}" readonly>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="description">Description</label>
                                        <input type="text" id="description" name="description" class="form-control"
                                            value="{{ $m2mcurtain->description ?? null }}" readonly>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="lead_date">Lead Date</label>
                                        <input type="text" id="lead_date" name="lead_date" class="form-control"
                                            value="{{ $m2mcurtain->lead_date ?? null }}" readonly>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="disposition">Call Disposition</label>
                                        <select id="disposition" name="disposition" id="call_disposition"
                                            class="form-control select2">
                                            <option value="">Select an option</option>
                                            <option {{ $m2mcurtain->disposition == "Answering_Machine"? 'selected' : '' }} value="Answering_Machine">Answering_Machine</option>
                                            <option {{ $m2mcurtain->disposition == "Disconnected_Wrong_Number"? 'selected' : '' }} value="Disconnected_Wrong_Number">Disconnected_Wrong_Number</option>
                                            <option {{ $m2mcurtain->disposition == "Busy"? 'selected' : '' }} value="Busy">Busy</option>
                                            <option {{ $m2mcurtain->disposition == "Callback"? 'selected' : '' }} value="Callback">Callback</option>
                                            <option {{ $m2mcurtain->disposition == "Customer_Contacted"? 'selected' : '' }} value="Customer_Contacted">Customer_Contacted</option>
                                            <option {{ $m2mcurtain->disposition == "Decision_Maker_Not_Available"? 'selected' : '' }} value="Decision_Maker_Not_Available">Decision_Maker_Not_Available
                                            </option>
                                            <option {{ $m2mcurtain->disposition == "Do_Not_Call"? 'selected' : '' }} value="Do_Not_Call">Do_Not_Call</option>
                                            <option {{ $m2mcurtain->disposition == "Fax_Machine"? 'selected' : '' }} value="Fax_Machine">Fax_Machine</option>
                                            <option {{ $m2mcurtain->disposition == "Language_Barrier"? 'selected' : '' }} value="Language_Barrier">Language_Barrier</option>
                                            <option {{ $m2mcurtain->disposition == "No_Answer"? 'selected' : '' }} value="No_Answer">No_Answer</option>
                                            <option {{ $m2mcurtain->disposition == "Not_Interested"? 'selected' : '' }} value="Not_Interested">Not_Interested</option>
                                            <option {{ $m2mcurtain->disposition == "Research_Completed"? 'selected' : '' }} value="Research_Completed">Research_Completed</option>
                                            <option {{ $m2mcurtain->disposition == "Vulnerable"? 'selected' : '' }} value="Vulnerable">Vulnerable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="form-group col-4">
                                        <label for="q1">Question 1: We noticed you recently decided not to proceed
                                            with your quote from our Made 2 Measure consultant, would you mind letting us
                                            know what the main factor was in the decision?</label>
                                    </div>
                                    <div class="form-group col-8">
                                        <textarea id="q1" name="q1" class="form-control">{{ $m2mcurtain->q1 ?? null }}</textarea>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="q2">Question 2: Were there any other factors that may have
                                            impacted your decision?</label>
                                    </div>
                                    <div class="form-group col-8">
                                        <textarea id="q2" name="q2" class="form-control">{{ $m2mcurtain->q2 ?? null }}</textarea>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="q3">Question 3: Can I ask which company you ended up going with?
                                            *** ONLY IS CUSTOMER WENT WITH DIFFERENT COMPANY</label>
                                    </div>
                                    <div class="form-group col-8">
                                        <textarea id="q3" name="q3" class="form-control">{{ $m2mcurtain->q3 ?? null }}</textarea>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="q4">Question 4: 4. What could we do differently in future to help
                                            provide the right solution for you?</label>
                                    </div>
                                    <div class="form-group col-8">
                                        <textarea id="q4" name="q4" class="form-control">{{ $m2mcurtain->q4 ?? null }}</textarea>
                                    </div>
                                </div>

                                <div>
                                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            //initaialise File input
            bsCustomFileInput.init();

            $('#disciplinary_action_id').on('select2:select', function(e) {
                var data = e.params.data;
                if (data.id == 16) {
                    $("#sub-cactegory-div").show();
                } else {
                    $("#sub-cactegory-div").hide();
                }
            });

            $('#agent_id').on('select2:select', function(e) {
                var firstname = $(this).select2().find(":selected").data("firstname");
                var lastname = $(this).select2().find(":selected").data("lastname");
                $("#agent_name").val(firstname + " " + lastname);
            });

            $("#contacted").change(function() {
                if (this.checked) {
                    $('#call_disposition').val(
                    'Research_Completed'); // Select the option with a value of 'Research_Completed'
                    $('#call_disposition').trigger('change');

                    $("#contact-section").show();

                } else {
                    $('#call_disposition').val(null).trigger('change');
                    $("#contact-section").hide();
                }
            });

            // // DropzoneJS Demo Code Start
            // Dropzone.autoDiscover = false;

            // // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            // var previewNode = document.querySelector("#template");
            // previewNode.id = "";
            // var previewTemplate = previewNode.parentNode.innerHTML;
            // previewNode.parentNode.removeChild(previewNode);

            // var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            //     url: "/target-url", // Set the url
            //     thumbnailWidth: 80,
            //     thumbnailHeight: 80,
            //     parallelUploads: 20,
            //     previewTemplate: previewTemplate,
            //     autoQueue: false, // Make sure the files aren't queued until manually added
            //     previewsContainer: "#previews", // Define the container to display the previews
            //     clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            // });

            // myDropzone.on("addedfile", function(file) {
            //     // Hookup the start button
            //     file.previewElement.querySelector(".start").onclick = function() {
            //         myDropzone.enqueueFile(file);
            //     };
            // });

            // // Update the total progress bar
            // myDropzone.on("totaluploadprogress", function(progress) {
            //     document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
            // });

            // myDropzone.on("sending", function(file) {
            //     // Show the total progress bar when upload starts
            //     document.querySelector("#total-progress").style.opacity = "1";
            //     // And disable the start button
            //     file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
            // });

            // // Hide the total progress bar when nothing's uploading anymore
            // myDropzone.on("queuecomplete", function(progress) {
            //     document.querySelector("#total-progress").style.opacity = "0";
            // });

            // // Setup the buttons for all transfers
            // // The "add files" button doesn't need to be setup because the config
            // // `clickable` has already been specified.
            // document.querySelector("#actions .start").onclick = function() {
            //     myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            // };
            // document.querySelector("#actions .cancel").onclick = function() {
            //     myDropzone.removeAllFiles(true);
            // };
            // // DropzoneJS Demo Code End
        });
    </script>
@endsection
