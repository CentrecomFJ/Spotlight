@extends('layouts.adminlte-iframe')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>InXpress Market Research</h1>
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
                        <div class="callout callout-info m-3 col-5 text-primary">
                            <h4>Script</h4>

                            <p>Good Morning, This is "<strong>{{ Auth::user()->name }}</strong>" <br>Perhaps you can help me as we are doing some Market Research within your specific industry. <br>Can I ask you a few questions?</p>
                        </div>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.customsurvey.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="contacted" name="contacted" value="Yes">
                                <label for="contacted" class="custom-control-label">Click if Contacted?</label>
                            </div>

                            <div class="row mt-4">
                                <div class="form-group col-4">
                                    <label for="company_name">Company name*</label>
                                    <input type="text" id="company_name" name="company_name" class="form-control" value="" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="business_nature">Nature of Business*</label>
                                    <input type="text" id="business_nature" name="business_nature" class="form-control" value="">
                                </div>

                                <div class="form-group col-4">
                                    <label for="call_disposition">Call Disposition*</label>
                                    <select id="call_disposition" name="call_disposition" id="call_disposition_nocontact" class="form-control select2">
                                        <option value="">Select an option</option>
                                        <option value="Answering_Machine">Answering_Machine</option>
                                        <option value="Disconnected_Wrong_Number">Disconnected_Wrong_Number</option>
                                        <option value="Busy">Busy</option>
                                        <option value="Callback">Callback</option>
                                        <option value="Customer_Contacted">Customer_Contacted</option>
                                        <option value="Decision_Maker_Not_Available">Decision_Maker_Not_Available</option>
                                        <option value="Do_Not_Call">Do_Not_Call</option>
                                        <option value="Fax_Machine">Fax_Machine</option>
                                        <option value="Language_Barrier">Language_Barrier</option>
                                        <option value="No_Answer">No_Answer</option>
                                        <option value="Not_Interested">Not_Interested</option>
                                        <option value="Research_Completed">Research_Completed</option>
                                        <option value="Vulnerable">Vulnerable</option>
                                    </select>
                                </div>
                            </div>
                            <div id="contact-section" style="display: none;">
                                <div class="callout callout-info col-5 mt-4 text-primary">
                                    <p> <i class="fas fa-bullhorn"></i> Create a conversation with regards to the nature of business</p>
                                </div>

                                <h4 class="mt-4 mb-4 text-info">Exports</h4>

                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="export_document-question">May I ask, do you ever have the need of sending documents/packages or boxes overseas?*</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="export_document" id="export_document-yes" value="Yes" class="custom-control-input">
                                            <label class="custom-control-label" for="export_document-yes">Yes
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="export_document" id="export_document-no" value="No" class="custom-control-input">
                                            <label class="custom-control-label" for="export_document-no">No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="export_document_where">Where to?*</label>
                                        <input type="text" id="export_document_where" name="export_document_where" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="export_document_weight">Average Weights?*</label>
                                        <input type="text" id="export_document_weight" name="export_document_weight" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="export_document_permonth">How often?*</label>
                                        <select name="export_document_permonth" id="export_document_permonth" class="form-control select2">
                                            <option value="">Select an option</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="row mt-4 mb-4">
                                <div class="form-group col-3">
                                    <label for="export_packagesboxes-question">And May I ask, Do you send packages or boxes overseas?*</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="export_packagesboxes" id="export_packagesboxes-yes" value="Yes" class="custom-control-input">
                                        <label class="custom-control-label" for="export_packagesboxes-yes">Yes
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="export_packagesboxes" id="export_packagesboxes-no" value="No" class="custom-control-input">
                                        <label class="custom-control-label" for="export_packagesboxes-no">No
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-3">
                                    <label for="export_packagesboxes_where">Where to?*</label>
                                    <input type="text" id="export_packagesboxes_where" name="export_packagesboxes_where" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="export_packagesboxest_weight">Average Weights?*</label>
                                    <input type="text" id="export_packagesboxest_weight" name="export_packagesboxes_weight" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="export_packagesboxes_permonth">How often?*</label>
                                    <input type="text" id="export_packagesboxes_permonth" name="export_packagesboxes_permonth" class="form-control" value="">
                                </div>
                            </div> -->

                                <h4 class="mt-4 mb-4 text-info">Imports</h4>


                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="import_document-question">May I ask, do you ever have the need of importing documents packages or boxes?*</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="import_document" id="import_document-yes" value="Yes" class="custom-control-input">
                                            <label class="custom-control-label" for="import_document-yes">Yes
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="import_document" id="import_document-no" value="No" class="custom-control-input">
                                            <label class="custom-control-label" for="import_document-no">No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="import_document_where">Where to?*</label>
                                        <input type="text" id="import_document_where" name="import_document_where" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="import_document_weight">Average Weights?*</label>
                                        <input type="text" id="import_document_weight" name="import_document_weight" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="import_document_permonth">How often?*</label>
                                        <select name="import_document_permonth" id="import_document_permonth" class="form-control select2">
                                            <option value="">Select an option</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="row mt-4 mb-4">

                                <div class="form-group col-3">
                                    <label for="import_packagesboxes-question">And May I ask, Do you import packages or boxes overseas?*</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="import_packagesboxes" id="import_packagesboxes-yes" value="Yes" class="custom-control-input">
                                        <label class="custom-control-label" for="import_packagesboxes-yes">Yes
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="import_packagesboxes" id="import_packagesboxes-no" value="No" class="custom-control-input">
                                        <label class="custom-control-label" for="import_packagesboxes-no">No
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-3">
                                    <label for="import_packagesboxes_where">Where to?*</label>
                                    <input type="text" id="import_packagesboxes_where" name="import_packagesboxes_where" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="import_packagesboxest_weight">Average Weights?*</label>
                                    <input type="text" id="import_packagesboxest_weight" name="import_packagesboxes_weight" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="import_packagesboxes_permonth">How often?*</label>
                                    <input type="text" id="import_packagesboxes_permonth" name="import_packagesboxes_permonth" class="form-control" value="">
                                </div>
                            </div> -->

                                <hr>

                                <div class="row mt-4 mb-4">
                                    <div class="form-group col-6">
                                        <label for="who_pays_exportimport">Who currently pays for the importing or exporting?*</label>
                                        <input type="text" id="who_pays_exportimport" name="who_pays_exportimport" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="shipment_contents">What would the contents of your shipments be?*</label>
                                        <input type="text" id="shipment_contents" name="shipment_contents" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="who_deals_send_docsparcel">Who deals with your sending of Documents or Parcels?*</label>
                                        <input type="text" id="who_deals_send_docsparcel" name="who_deals_send_docsparcel" class="form-control" value="">
                                    </div>
                                    <!-- <div class="form-group col-6">
                                    <label for="other_depts_sending_shipments">Is there any other departments or people who would deal with sending shipments?*</label>
                                    <input type="text" id="other_depts_sending_shipments" name="other_depts_sending_shipments" class="form-control" value="">
                                </div> -->
                                </div>

                                <!-- <h4 class="mt-4 mb-4 text-info">Boxed Shipment</h4>

                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="need_100kilos_shipment-question">Do you have any need for sending/receiving shipments that are between 1 and 100 kilos?*</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="need_100kilos_shipment" id="need_100kilos_shipment-yes" value="Yes" class="custom-control-input">
                                        <label class="custom-control-label" for="need_100kilos_shipment-yes">Yes
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="need_100kilos_shipment" id="need_100kilos_shipment-no" value="No" class="custom-control-input">
                                        <label class="custom-control-label" for="need_100kilos_shipment-no">No
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-3">
                                    <label for="need_100kilos_shipment_to_where">Where to?*</label>
                                    <input type="text" id="need_100kilos_shipment_to_where" name="need_100kilos_shipment_to_where" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="need_100kilos_shipment_to_weight">Average Weights?*</label>
                                    <input type="text" id="need_100kilos_shipment_to_weight" name="need_100kilos_shipment_to_weight" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="need_100kilos_shipment_to_permonth">How often?*</label>
                                    <select name="need_100kilos_shipment_to_permonth" id="need_100kilos_shipment_to_permonth" class="form-control select2">
                                        <option value="">Select an option</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Quarterly">Quarterly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>

                                <div class="form-group col-3 offset-3">
                                    <label for="need_100kilos_shipment_from_where">Where from?*</label>
                                    <input type="text" id="need_100kilos_shipment_from_where" name="need_100kilos_shipment_from_where" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="need_100kilos_shipment_from_weight">Average Weights?*</label>
                                    <input type="text" id="need_100kilos_shipment_from_weight" name="need_100kilos_shipment_from_weight" class="form-control" value="">
                                </div>

                                <div class="form-group col-3">
                                    <label for="need_100kilos_shipment_from_permonth">How often?*</label>
                                    <select name="need_100kilos_shipment_from_permonth" id="need_100kilos_shipment_from_permonth" class="form-control select2">
                                        <option value="">Select an option</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Quarterly">Quarterly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>
                            </div> -->


                                <div class="row mt-4 mb-4">
                                    <div class="form-group col-12">
                                        <label for="who_you_using_shipping">Who would you be using for sending your shipments right now?*</label>
                                        <input type="text" id="who_you_using_shipping" name="who_you_using_shipping" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="callout callout-info col-5 mt-4 text-primary">
                                    <p> <i class="fas fa-bullhorn"></i> Can I please confirm your contact details</p>
                                </div>

                                <h4 class="mt-4 mb-4 text-info">Contact Details</h4>

                                <div class="row mt-4 mb-4">
                                    <div class="form-group col-6">
                                        <label for="contact_name">Name*</label>
                                        <input type="text" id="contact_name" name="contact_name" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="contact_phone">Phone*</label>
                                        <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="contact_email">Email*</label>
                                        <input type="text" id="contact_email" name="contact_email" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="contact_current_address">Current Address*</label>
                                        <input type="text" id="contact_current_address" name="contact_current_address" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-4">
                                    <div class="form-group col-12">
                                        <label for="any_info_shipping">Remarks*</label>
                                        <input type="text" id="any_info_shipping" name="any_info_shipping" class="form-control" value="">
                                    </div>
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
                $('#call_disposition').val('Research_Completed'); // Select the option with a value of 'Research_Completed'
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