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
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header" style="color:white;background:#91c556;">
                        <h4>Call Entry Form </h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" style="min-height:300px;" id="sales-tracker-form" action="{{ route('admin.calltracker.store') }}">
                            @csrf


                            <!-- skill -->

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="skill" class="col-md-2 col-form-label text-md-left">Skill</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="skill" data-width="100%" id="skill">
                                        <option value="">Select skill</option>

                                        <option value="MLMR_Government">LMR_Government</option>
                                        <option value="MLMR_Public">LMR_Public</option>

                                    </select>

                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="refno" class="col-md-2 col-form-label text-md-left">Ref No:</label>

                                <div class="col-md-1">
                                    <input id="refno" type="text" value="{{ $refno ?? '' }}" class="form-control" name="refno" required autocomplete="title" readonly>
                                </div>
                            </div>

                            <!-- category -->
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="category" class="col-md-2 col-form-label text-md-left">Category</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="category" data-width="100%" id="category">
                                        <option value="">Select a category</option>
                                        <option value="Accounts">Accounts</option>
                                        <option value="Lands_Admin">Lands Admin</option>
                                        <option value="Valuations">Valuations</option>
                                        <option value="Survey">Survey</option>
                                        <option value="General">General</option>
                                    </select>

                                </div>
                            </div>
                            <hr>
                            <!-- Customer Details -->
                            <h5 style="text-decoration: underline;">Customer Details</h5>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="firstname" class="col-md-2 col-form-label text-md-left">First name:</label>

                                <div class="col-md-4">
                                    <input id="firstname" type="text" value="" class="form-control" name="firstname" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="lastname" class="col-md-2 col-form-label text-md-left">Last name:</label>

                                <div class="col-md-4">
                                    <input id="lastname" type="text" value="" class="form-control" name="lastname" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in street number" for="streetnum" class="col-md-2 col-form-label text-md-left">Street number:</label>

                                <div class="col-md-4">
                                    <input id="streetnum" type="text" value="" class="form-control" name="streetnum" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="streetname" class="col-md-2 col-form-label text-md-left">Street name:</label>

                                <div class="col-md-4">
                                    <input id="streetname" type="text" value="" class="form-control" name="streetname" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in" for="suburb" class="col-md-2 col-form-label text-md-left">Suburb:</label>

                                <div class="col-md-4">
                                    <input id="suburb" type="text" value="" class="form-control" name="suburb" required autocomplete="title" autofocus>
                                </div>

                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="town_city" class="col-md-2 col-form-label text-md-left">Town/City:</label>

                                <div class="col-md-4">
                                    <select class="form-control select2" name="town_city" data-width="100%" id="town_city">
                                        <option value="">Select an Area</option>
                                        <option value="Ba">Ba</option>
                                        <option value="Bua">Bua</option>
                                        <option value="Wainibuka">Wainibuka</option>
                                        <option value="Tavua">Tavua</option>
                                        <option value="Kadavu">Kadavu</option>
                                        <option value="Lau">Lau</option>
                                        <option value="Lautoka">Lautoka</option>
                                        <option value="Savusavu">Savusavu</option>
                                        <option value="Rakiraki">Rakiraki</option>
                                        <option value="Sigatoka">Sigatoka</option>
                                        <option value="Suva">Suva</option>
                                        <option value="Nausori">Nausori</option>
                                        <option value="Labasa">Labasa</option>
                                        <option value="Rotuma">Rotuma</option>
                                        <option value="Taveuni">Taveuni</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="mobile" class="col-md-2 col-form-label text-md-left">Mobile number:</label>

                                <div class="col-md-4">
                                    <input id="mobile" type="text" value="" class="form-control" name="mobile" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="alt_contact" class="col-md-2 col-form-label text-md-left">Alternate contact number:</label>

                                <div class="col-md-4">
                                    <input id="alt_contact" type="text" value="" class="form-control" name="alt_contact" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in" for="postal" class="col-md-2 col-form-label text-md-left">Postal address:</label>

                                <div class="col-md-4">
                                    <input id="postal" type="text" value="" class="form-control" name="postal" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="email" class="col-md-2 col-form-label text-md-left">Email:</label>

                                <div class="col-md-4">
                                    <input id="email" type="email" value="" class="form-control" name="email" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="dl_num" class="col-md-2 col-form-label text-md-left">DL number:</label>

                                <div class="col-md-4">
                                    <input id="dl_num" type="text" value="" class="form-control" name="dl_num" autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="clr_num" class="col-md-2 col-form-label text-md-left">Crown Lease number:</label>

                                <div class="col-md-4">
                                    <input id="clr_num" type="text" value="" class="form-control" name="clr_num" autocomplete="title" autofocus>
                                </div>
                            </div>
                            <hr>
                            <!-- sub category -->
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="sub_category" class="col-md-2 col-form-label text-md-left">Subcategory:</label>

                                <div class="col-md-4">
                                    <select class="form-control select2" name="sub_category" data-width="100%" id="sub_category">
                                        <option value="">Select a subcategory</option>
                                        <option value="Enquiry">Enquiry</option>
                                        <option value="Escalations">Escalations</option>
                                        <option value="Complaints">Complaints</option>
                                    </select>
                                </div>
                            </div>

                            <!-- enquiry -->
                            <div id="enquiry-section" style="display: none;">
                                <hr>
                                <h5 style="text-decoration: underline;">Enquiry</h5>
                                <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="enquiry_comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                    <div class="col-md-6">
                                        <textarea style="height:200px;" id="enquiry_comments" type="text" class="form-control" name="enquiry_comments" value="" autocomplete="reason" autofocus></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- escalations -->
                            <div id="escalations-section" style="display: none;">
                                <hr>
                                <h5 style="text-decoration: underline;">Escalations</h5>
                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Select the option number that you are processing for." for="escalation_department" class="col-md-2 col-form-label text-md-left">Department:</label>

                                    <div class="col-md-4">
                                        <select class="form-control select2" name="escalation_department" data-width="100%" id="escalation_department">
                                            <option value="">Select a department</option>
                                            <!-- <option value="Minister – Permanent Secretary/Deputy Secretary /DL/AD Minister">Minister – Permanent Secretary/Deputy Secretary /DL/AD Minister</option>
                                            <option value="Lands Admin">Lands Admin</option>
                                            <option value="Policy">Policy</option>
                                            <option value="Planning & Quality Assurance">Planning & Quality Assurance</option>
                                            <option value="Corporate Services – Admin">Corporate Services – Admin</option>
                                            <option value="Corporate Services – Accounts">Corporate Services – Accounts</option>
                                            <option value="Geospatial Information Management/ Other">Geospatial Information Management/ Other</option> -->
                                            <option value="Accounts">Accounts</option>
                                            <option value="Lands_Admin">Lands Admin</option>
                                            <option value="Valuations">Valuations</option>
                                            <option value="Survey">Survey</option>
                                            <option value="General">General</option>
                                        </select>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="escalation_person_name" class="col-md-2 col-form-label text-md-left">Name of person Transferred to:</label>

                                    <div class="col-md-4">
                                        <input id="escalation_person_name" type="text" value="" class="form-control" name="escalation_person_name" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Select the option number that you are processing for." for="escalation_outcome" class="col-md-2 col-form-label text-md-left">Outcome:</label>

                                    <div class="col-md-4">
                                        <select class="form-control select2" name="escalation_outcome" data-width="100%" id="escalation_outcome">
                                            <option value="">Select an outcome</option>
                                            <option value="Warm Transfer">Warm Transfer</option>
                                            <option value="Unavailable">Unavailable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Select the option number that you are processing for." for="escalation_call_disposition" class="col-md-2 col-form-label text-md-left">Call disposition:</label>

                                    <div class="col-md-4">
                                        <select class="form-control select2" name="escalation_call_disposition" data-width="100%" id="escalation_call_disposition">
                                            <option value="">Select a disposition</option>
                                            <!-- <option value="Payment">Payment</option>
                                            <option value="Waiver Request">Waiver Request</option>
                                            <option value="Royalties">Royalties</option>
                                            <option value="Lease/ License Renewal">Lease/ License Renewal</option>
                                            <option value="Lease/ License Extension">Lease/ License Extension</option>
                                            <option value="Surrender Lease/ License">Surrender Lease/ License</option>
                                            <option value="Lease/ License Re-entry">Lease/ License Re-entry</option>
                                            <option value="Lease Correction">Lease Correction</option>
                                            <option value="Dedication">Dedication</option>
                                            <option value="Vesting">Vesting</option>
                                            <option value="Caveats">Caveats</option>
                                            <option value="Lease/ License Transfer">Lease/ License Transfer</option>
                                            <option value="Application Processing">Application Processing</option>
                                            <option value="Legal Proceedings">Legal Proceedings</option>
                                            <option value="Central Eastern Survey">Central Eastern Survey</option>
                                            <option value="Northern Survey">Northern Survey</option>
                                            <option value="Western Survey">Western Survey</option>
                                            <option value="Control Section">Control Section</option>
                                            <option value="Request for Provisional Title">Request for Provisional Title</option>
                                            <option value="Ministerial Consent">Ministerial Consent</option>
                                            <option value="iTaukei Land Lease to State">iTaukei Land Lease to State</option>
                                            <option value="Administration">Administration</option>
                                            <option value="Ratings and Statistics/Research">Ratings and Statistics/Research</option>
                                            <option value="Land Acquisition and Special Valuation">Land Acquisition and Special Valuation</option>
                                            <option value="Rental and Estate">Rental and Estate</option>
                                            <option value="Squatter">Squatter</option>
                                            <option value="Surveying">Surveying</option>
                                            <option value="Valuation">Valuation</option>
                                            <option value="Landuse">Landuse</option>
                                            <option value="GIS & Mapping">GIS & Mapping</option>
                                            <option value="Geospatial Division">Geospatial Division</option> -->

                                            <option value='Land Acquisition and Special Valuation'>Land Acquisition and Special Valuation</option>
                                            <option value='Gravel/Sand extraction licence'>Gravel/Sand extraction licence</option>
                                            <option value='Landuse'>Landuse</option>
                                            <option value='Site inspection'>Site inspection</option>
                                            <option value='Squatter'>Squatter</option>
                                            <option value='Rental Payment'>Rental Payment</option>
                                            <option value='Staff transfer'>Staff transfer</option>
                                            <option value='Application Processing'>Application Processing</option>
                                            <option value='Rental & Estate'>Rental & Estate</option>
                                            <option value='Survey instructions'>Survey instructions</option>
                                            <option value='Consent follow up'>Consent follow up</option>
                                            <option value='Consent checklist'>Consent checklist</option>
                                            <option value='Accounts General'>Accounts General</option>
                                            <option value='Lands Admin General'>Lands Admin General</option>
                                            <option value='Waiver Request'>Waiver Request</option>
                                            <option value='Central Eastern Survey'>Central Eastern Survey</option>
                                            <option value='Survey General'>Survey General</option>
                                            <option value='Appointment'>Appointment</option>
                                            <option value='Valuation General'>Valuation General</option>
                                            <option value='Inspection fees'>Inspection fees</option>
                                            <option value='Statement enquiry/follow up'>Statement enquiry/follow up</option>
                                            <option value='Consent enquiry'>Consent enquiry</option>
                                            <option value='Personal call'>Personal call</option>
                                            <option value='Re-newal of lease/Application'>Re-newal of lease/Application</option>

                                            <option value='Mapping enquiry'>Mapping enquiry</option>
                                            <option value='Sub-let consent'>Sub-let consent</option>
                                            <option value='Sub-lease consent'>Sub-lease consent</option>
                                            <option value='Registry'>Registry</option>
                                            <option value='Pegging Survey'>Pegging Survey</option>
                                            <option value='Gravel Extraction License'>Gravel Extraction License</option>
                                            <option value='Mortgage consent'>Mortgage consent</option>

                                            <option value='Internal Transfer'>Internal Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="escalation_comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                    <div class="col-md-6">
                                        <textarea style="height:200px;" id="escalation_comments" type="text" class="form-control" name="escalation_comments" value="" autocomplete="reason" autofocus></textarea>

                                    </div>
                                </div>
                            </div>

                            <!-- complaints -->
                            <div id="complaints-section" style="display: none;">
                                <hr>
                                <h5 style="text-decoration: underline;">Complaints</h5>
                                <div class="form-group row s1">
                                    <label data-toggle="tooltip" title="Select the option number that you are processing for." for="complaint_type" class="col-md-2 col-form-label text-md-left">Complaints Type:</label>

                                    <div class="col-md-4">
                                        <select class="form-control select2" name="complaint_type" data-width="100%" id="complaint_type">
                                            <option value="">Select a complaint type</option>
                                            <option value="Land Dealings (illegal tenancy)">Land Dealings (illegal tenancy)</option>
                                            <option value="Consents">Consents</option>
                                            <option value="Leases">Leases</option>
                                            <option value="Subdivision">Subdivision</option>
                                            <option value="Rental Issues">Rental Issues</option>
                                            <option value="Application for Land">Application for Land</option>
                                            <option value="License">License</option>
                                            <option value="Rezoning">Rezoning</option>
                                            <option value="Checking of plans">Checking of plans</option>
                                            <option value="Access rd & Drainage">Access rd & Drainage</option>
                                            <option value="Reversal of Land">Reversal of Land</option>
                                        </select>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="complaint_ticket" class="col-md-2 col-form-label text-md-left">Ticket number:</label>

                                    <div class="col-md-4">
                                        <input id="complaint_ticket" type="text" value="" class="form-control" name="complaint_ticket" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="complaint_comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                    <div class="col-md-6">
                                        <textarea style="height:200px;" id="complaint_comments" type="text" class="form-control" name="complaint_comments" value="" autocomplete="reason" autofocus></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- end inputs -->
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
    });
</script>
@endsection