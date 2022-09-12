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
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header" style="color:black;background:#d4d13d;">
                        <strong>{{ trans('global.edit') }} Call Record # {{ $calltracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.calltracker.update', [$calltracker->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="id" value="{{$calltracker->id ?? null }}"> </input>
                            <!-- skill -->
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="skill" class="col-md-2 col-form-label text-md-left">Skill</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="skill" data-width="100%" id="skill">
                                        <option value="">Select skill</option>
                                        <option {{ "MLMR_Government"== $calltracker->skill ? "selected" : "" }} value="MLMR_Government">LMR_Government</option>
                                        <option {{ "MLMR_Public"== $calltracker->skill ? "selected" : "" }} value="MLMR_Public">LMR_Public</option>

                                    </select>

                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="refno" class="col-md-2 col-form-label text-md-left">Ref No:</label>

                                <div class="col-md-2">
                                    <input id="refno" type="text" value="{{ $calltracker->refno ?? '' }}" class="form-control" name="refno" required autocomplete="title" readonly>
                                </div>
                            </div>

                            <!-- category -->
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="category" class="col-md-2 col-form-label text-md-left">Category</label>

                                <div class="col-md-4">

                                    <select class="form-control select2" name="category" data-width="100%" id="category">
                                        <option value="">Select a category</option>
                                        <option {{ "Accounts"== $calltracker->category ? "selected" : "" }} value="Accounts">Accounts</option>
                                        <option {{ "Lands_Admin"== $calltracker->category ? "selected" : "" }} value="Lands_Admin">Lands Admin</option>
                                        <option {{ "Valuations"== $calltracker->category ? "selected" : "" }} value="Valuations">Valuations</option>
                                        <option {{ "Survey"== $calltracker->category ? "selected" : "" }} value="Survey">Survey</option>
                                        <option {{ "General"== $calltracker->category ? "selected" : "" }} value="General">General</option>
                                    </select>

                                </div>
                            </div>
                            <hr>
                            <!-- Customer Details -->
                            <h5 style="text-decoration: underline;">Customer Details</h5>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="firstname" class="col-md-2 col-form-label text-md-left">First name:</label>

                                <div class="col-md-4">
                                    <input id="firstname" type="text" value="{{ $calltracker->firstname ?? null }}" class="form-control" name="firstname" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="lastname" class="col-md-2 col-form-label text-md-left">Last name:</label>

                                <div class="col-md-4">
                                    <input id="lastname" type="text" value="{{ $calltracker->lastname ?? null }}" class="form-control" name="lastname" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in street number" for="streetnum" class="col-md-2 col-form-label text-md-left">Street number:</label>

                                <div class="col-md-4">
                                    <input id="streetnum" type="text" value="{{ $calltracker->streetnum ?? null }}" class="form-control" name="streetnum" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="streetname" class="col-md-2 col-form-label text-md-left">Street name:</label>

                                <div class="col-md-4">
                                    <input id="streetname" type="text" value="{{ $calltracker->streetname ?? null }}" class="form-control" name="streetname" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in" for="surburb" class="col-md-2 col-form-label text-md-left">Suburb:</label>

                                <div class="col-md-4">
                                    <input id="surburb" type="text" value="{{ $calltracker->suburb ?? null }}" class="form-control" name="suburb" required autocomplete="title" autofocus>
                                </div>

                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="town_city" class="col-md-2 col-form-label text-md-left">Town/City:</label>

                                <div class="col-md-4">
                                    <select class="form-control select2" name="town_city" data-width="100%" id="town_city">
                                        <option value="">Select an Area</option>
                                        <option {{ "Ba"== $calltracker->town_city ? "selected" : "" }} value="Ba">Ba</option>
                                        <option {{ "Bua"== $calltracker->town_city ? "selected" : "" }} value="Bua">Bua</option>
                                        <option {{ "Wainibuka"== $calltracker->town_city ? "selected" : "" }} value="Wainibuka">Wainibuka</option>
                                        <option {{ "Tavua"== $calltracker->town_city ? "selected" : "" }} value="Tavua">Tavua</option>
                                        <option {{ "Kadavu"== $calltracker->town_city ? "selected" : "" }} value="Kadavu">Kadavu</option>
                                        <option {{ "Lau"== $calltracker->town_city ? "selected" : "" }} value="Lau">Lau</option>
                                        <option {{ "Lautoka"== $calltracker->town_city ? "selected" : "" }} value="Lautoka">Lautoka</option>
                                        <option {{ "Savusavu"== $calltracker->town_city ? "selected" : "" }} value="Savusavu">Savusavu</option>
                                        <option {{ "Rakiraki"== $calltracker->town_city ? "selected" : "" }} value="Rakiraki">Rakiraki</option>
                                        <option {{ "Sigatoka"== $calltracker->town_city ? "selected" : "" }} value="Sigatoka">Sigatoka</option>
                                        <option {{ "Suva"== $calltracker->town_city ? "selected" : "" }} value="Suva">Suva</option>
                                        <option {{ "Nausori"== $calltracker->town_city ? "selected" : "" }} value="Nausori">Nausori</option>
                                        <option {{ "Labasa"== $calltracker->town_city ? "selected" : "" }} value="Labasa">Labasa</option>
                                        <option {{ "Rotuma"== $calltracker->town_city ? "selected" : "" }} value="Rotuma">Rotuma</option>
                                        <option {{ "Taveuni"== $calltracker->town_city ? "selected" : "" }} value="Taveuni">Taveuni</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in your" for="mobile" class="col-md-2 col-form-label text-md-left">Mobile number:</label>

                                <div class="col-md-4">
                                    <input id="mobile" type="text" value="{{ $calltracker->mobile ?? null }}" class="form-control" name="mobile" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="alt_contact" class="col-md-2 col-form-label text-md-left">Alternate contact number:</label>

                                <div class="col-md-4">
                                    <input id="alt_contact" type="text" value="{{ $calltracker->alt_contact ?? null }}" class="form-control" name="alt_contact" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in" for="postal" class="col-md-2 col-form-label text-md-left">Postal address:</label>

                                <div class="col-md-4">
                                    <input id="postal" type="text" value="{{ $calltracker->postal ?? null }}" class="form-control" name="postal" required autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="email" class="col-md-2 col-form-label text-md-left">Email:</label>

                                <div class="col-md-4">
                                    <input id="email" type="email" value="{{ $calltracker->email ?? null }}" class="form-control" name="email" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row s1">
                                <label data-placement="bottom" data-toggle="tooltip" title="Type in first name" for="dl_num" class="col-md-2 col-form-label text-md-left">DL number:</label>

                                <div class="col-md-4">
                                    <input id="dl_num" type="text" value="{{ $calltracker->dl_num ?? null }}" class="form-control" name="dl_num" autocomplete="title" autofocus>
                                </div>

                                <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="clr_num" class="col-md-2 col-form-label text-md-left">Crown Lease number:</label>

                                <div class="col-md-4">
                                    <input id="clr_num" type="text" value="{{ $calltracker->clr_num ?? null }}" class="form-control" name="clr_num" autocomplete="title" autofocus>
                                </div>
                            </div>
                            <hr>
                            <!-- sub category -->
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select the option number that you are processing for." for="sub_category" class="col-md-2 col-form-label text-md-left">Subcategory:</label>

                                <div class="col-md-4">
                                    <select class="form-control select2" name="sub_category" data-width="100%" id="sub_category">
                                        <option value="">Select a subcategory</option>
                                        <option {{ "Enquiry"== $calltracker->sub_category ? "selected" : "" }} value="Enquiry">Enquiry</option>
                                        <option {{ "Escalations"== $calltracker->sub_category ? "selected" : "" }} value="Escalations">Escalations</option>
                                        <option {{ "Complaints"== $calltracker->sub_category ? "selected" : "" }} value="Complaints">Complaints</option>
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
                                        <textarea style="height:200px;" id="enquiry_comments" type="text" class="form-control" name="enquiry_comments" value="" autocomplete="reason" autofocus>{{ $calltracker->enquiry_comments ?? null }}</textarea>

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
                                            <!-- <option {{ "Minister – Permanent Secretary/Deputy Secretary /DL/AD Minister"== $calltracker->escalation_department ? "selected" : "" }} value="Minister – Permanent Secretary/Deputy Secretary /DL/AD Minister">Minister – Permanent Secretary/Deputy Secretary /DL/AD Minister</option>
                                            <option {{ "Lands Admin"== $calltracker->escalation_department ? "selected" : "" }} value="Lands Admin">Lands Admin</option>
                                            <option {{ "Policy"== $calltracker->escalation_department ? "selected" : "" }} value="Policy">Policy</option>
                                            <option {{ "Planning & Quality Assurance"== $calltracker->escalation_department ? "selected" : "" }} value="Planning & Quality Assurance">Planning & Quality Assurance</option>
                                            <option {{ "Corporate Services – Admin"== $calltracker->escalation_department ? "selected" : "" }} value="Corporate Services – Admin">Corporate Services – Admin</option>
                                            <option {{ "Corporate Services – Accounts"== $calltracker->escalation_department ? "selected" : "" }} value="Corporate Services – Accounts">Corporate Services – Accounts</option>
                                            <option {{ "Geospatial Information Management/ Other"== $calltracker->escalation_department ? "selected" : "" }} value="Geospatial Information Management/ Other">Geospatial Information Management/ Other</option> -->
                                            <option {{ "Accounts"== $calltracker->category ? "selected" : "" }} value="Accounts">Accounts</option>
                                            <option {{ "Lands_Admin"== $calltracker->category ? "selected" : "" }} value="Lands_Admin">Lands Admin</option>
                                            <option {{ "Valuations"== $calltracker->category ? "selected" : "" }} value="Valuations">Valuations</option>
                                            <option {{ "Survey"== $calltracker->category ? "selected" : "" }} value="Survey">Survey</option>
                                            <option {{ "General"== $calltracker->category ? "selected" : "" }} value="General">General</option>
                                        </select>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="escalation_person_name" class="col-md-2 col-form-label text-md-left">Name of person Transferred to:</label>

                                    <div class="col-md-4">
                                        <input id="escalation_person_name" type="text" value="{{ $calltracker->escalation_person_name ?? null }}" class="form-control" name="escalation_person_name" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Select the option number that you are processing for." for="escalation_outcome" class="col-md-2 col-form-label text-md-left">Outcome:</label>

                                    <div class="col-md-4">
                                        <select class="form-control select2" name="escalation_outcome" data-width="100%" id="escalation_outcome">
                                            <option value="">Select an outcome</option>
                                            <option {{ "Warm Transfer"== $calltracker->escalation_outcome ? "selected" : "" }} value="Warm Transfer">Warm Transfer</option>
                                            <option {{ "Unavailable"== $calltracker->escalation_outcome ? "selected" : "" }} value="Unavailable">Unavailable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row s1a">
                                    <label data-toggle="tooltip" title="Select the option number that you are processing for." for="escalation_call_disposition" class="col-md-2 col-form-label text-md-left">Call disposition:</label>

                                    <div class="col-md-4">
                                        <select class="form-control select2" name="escalation_call_disposition" data-width="100%" id="escalation_call_disposition">
                                            <option value="">Select a disposition</option>
                                            <!-- <option {{ "Payment"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Payment">Payment</option>
                                            <option {{ "Waiver Request"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Waiver Request">Waiver Request</option>
                                            <option {{ "Royalties"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Royalties">Royalties</option>
                                            <option {{ "Lease/ License Renewal"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Lease/ License Renewal">Lease/ License Renewal</option>
                                            <option {{ "Lease/ License Extension"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Lease/ License Extension">Lease/ License Extension</option>
                                            <option {{ "Surrender Lease/ License"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Surrender Lease/ License">Surrender Lease/ License</option>
                                            <option {{ "Lease/ License Re-entry"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Lease/ License Re-entry">Lease/ License Re-entry</option>
                                            <option {{ "Lease Correction"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Lease Correction">Lease Correction</option>
                                            <option {{ "Dedication"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Dedication">Dedication</option>
                                            <option {{ "Vesting"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Vesting">Vesting</option>
                                            <option {{ "Caveats"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Caveats">Caveats</option>
                                            <option {{ "Lease/ License Transfer"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Lease/ License Transfer">Lease/ License Transfer</option>
                                            <option {{ "Application Processing"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Application Processing">Application Processing</option>
                                            <option {{ "Legal Proceedings"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Legal Proceedings">Legal Proceedings</option>
                                            <option {{ "Central Eastern Survey"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Central Eastern Survey">Central Eastern Survey</option>
                                            <option {{ "Northern Survey"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Northern Survey">Northern Survey</option>
                                            <option {{ "Western Survey"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Western Survey">Western Survey</option>
                                            <option {{ "Control Section"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Control Section">Control Section</option>
                                            <option {{ "Request for Provisional Title"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Request for Provisional Title">Request for Provisional Title</option>
                                            <option {{ "Ministerial Consent"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Ministerial Consent">Ministerial Consent</option>
                                            <option {{ "iTaukei Land Lease to State"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="iTaukei Land Lease to State">iTaukei Land Lease to State</option>
                                            <option {{ "Administration"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Administration">Administration</option>
                                            <option {{ "Ratings and Statistics/Research"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Ratings and Statistics/Research">Ratings and Statistics/Research</option>
                                            <option {{ "Land Acquisition and Special Valuation"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Land Acquisition and Special Valuation">Land Acquisition and Special Valuation</option>
                                            <option {{ "Rental and Estate"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Rental and Estate">Rental and Estate</option>
                                            <option {{ "Squatter"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Squatter">Squatter</option>
                                            <option {{ "Surveying"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Surveying">Surveying</option>
                                            <option {{ "Valuation"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Valuation">Valuation</option>
                                            <option {{ "Landuse"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Landuse">Landuse</option>
                                            <option {{ "GIS & Mapping"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="GIS & Mapping">GIS & Mapping</option>
                                            <option {{ "Geospatial Division"== $calltracker->escalation_call_disposition ? "selected" : "" }} value="Geospatial Division">Geospatial Division</option> -->

                                            <option {{ "Land Acquisition and Special Valuation"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Land Acquisition and Special Valuation'>Land Acquisition and Special Valuation</option>
                                            <option {{ "Gravel/Sand extraction licence"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Gravel/Sand extraction licence'>Gravel/Sand extraction licence</option>
                                            <option {{ "Landuse"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Landuse'>Landuse</option>
                                            <option {{ "Site inspection"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Site inspection'>Site inspection</option>
                                            <option {{ "Squatter"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Squatter'>Squatter</option>
                                            <option {{ "Rental Payment"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Rental Payment'>Rental Payment</option>
                                            <option {{ "Staff transfer"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Staff transfer'>Staff transfer</option>
                                            <option {{ "Application Processing"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Application Processing'>Application Processing</option>
                                            <option {{ "Rental & Estate"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Rental & Estate'>Rental & Estate</option>
                                            <option {{ "Survey instructions"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Survey instructions'>Survey instructions</option>
                                            <option {{ "Consent follow up"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Consent follow up'>Consent follow up</option>
                                            <option {{ "Consent checklist"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Consent checklist'>Consent checklist</option>
                                            <option {{ "Accounts General"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Accounts General'>Accounts General</option>
                                            <option {{ "Lands Admin General"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Lands Admin General'>Lands Admin General</option>
                                            <option {{ "Waiver Request"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Waiver Request'>Waiver Request</option>
                                            <option {{ "Central Eastern Survey"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Central Eastern Survey'>Central Eastern Survey</option>
                                            <option {{ "Survey General"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Survey General'>Survey General</option>
                                            <option {{ "Appointment"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Appointment'>Appointment</option>
                                            <option {{ "Valuation General"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Valuation General'>Valuation General</option>
                                            <option {{ "Inspection fees"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Inspection fees'>Inspection fees</option>

                                            <option {{ "Statement enquiry/follow up"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Statement enquiry/follow up'>Statement enquiry/follow up</option>
                                            <option {{ "Consent enquiry"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Consent enquiry'>Consent enquiry</option>
                                            <option {{ "Personal call"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Personal call'>Personal call</option>
                                            <option {{ "Re-newal of lease/Application"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Re-newal of lease/Application'>Re-newal of lease/Application</option>

                                            <option {{ "Mapping enquiry"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Mapping enquiry'>Mapping enquiry</option>
                                            <option {{ "Sub-let consent"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Sub-let consent'>Sub-let consent</option>
                                            <option {{ "Sub-lease consent"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Sub-lease consent'>Sub-lease consent</option>
                                            <option {{ "Registry"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Registry'>Registry</option>
                                            <option {{ "Pegging Survey"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Pegging Survey'>Pegging Survey</option>
                                            <option {{ "Gravel Extraction License"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Gravel Extraction License'>Gravel Extraction License</option>
                                            <option {{ "Mortgage consent"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Mortgage consent'>Mortgage consent</option>
                                        
                                            <option {{ "Internal Transfer"== $calltracker->escalation_call_disposition ? "selected" : "" }} value='Internal Transfer'>Internal Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="escalation_comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                    <div class="col-md-6">
                                        <textarea style="height:200px;" id="escalation_comments" type="text" class="form-control" name="escalation_comments" value="" autocomplete="reason" autofocus>{{ $calltracker->escalation_comments ?? null }}</textarea>

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
                                            <option {{ "Land Dealings (illegal tenancy)"== $calltracker->complaint_type ? "selected" : "" }} value="Land Dealings (illegal tenancy)">Land Dealings (illegal tenancy)</option>
                                            <option {{ "Consents"== $calltracker->complaint_type ? "selected" : "" }} value="Consents">Consents</option>
                                            <option {{ "Leases"== $calltracker->complaint_type ? "selected" : "" }} value="Leases">Leases</option>
                                            <option {{ "Subdivision"== $calltracker->complaint_type ? "selected" : "" }} value="Subdivision">Subdivision</option>
                                            <option {{ "Rental Issues"== $calltracker->complaint_type ? "selected" : "" }} value="Rental Issues">Rental Issues</option>
                                            <option {{ "Application for Land"== $calltracker->complaint_type ? "selected" : "" }} value="Application for Land">Application for Land</option>
                                            <option {{ "License"== $calltracker->complaint_type ? "selected" : "" }} value="License">License</option>
                                            <option {{ "Rezoning"== $calltracker->complaint_type ? "selected" : "" }} value="Rezoning">Rezoning</option>
                                            <option {{ "Checking of plans"== $calltracker->complaint_type ? "selected" : "" }} value="Checking of plans">Checking of plans</option>
                                            <option {{ "Access rd & Drainage"== $calltracker->complaint_type ? "selected" : "" }} value="Access rd & Drainage">Access rd & Drainage</option>
                                            <option {{ "Reversal of Land"== $calltracker->complaint_type ? "selected" : "" }} value="Reversal of Land">Reversal of Land</option>
                                        </select>
                                    </div>

                                    <label data-placement="bottom" data-toggle="tooltip" title="Type in last name" for="complaint_ticket" class="col-md-2 col-form-label text-md-left">Ticket number:</label>

                                    <div class="col-md-4">
                                        <input id="complaint_ticket" type="text" value="{{ $calltracker->complaint_ticket ?? null }}" class="form-control" name="complaint_ticket" autocomplete="title" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="complaint_comments" class="col-md-2 col-form-label text-md-left">Comments:</label>

                                    <div class="col-md-6">
                                        <textarea style="height:200px;" id="complaint_comments" type="text" class="form-control" name="complaint_comments" value="{{ $calltracker->complaint_comments ?? null }}" autocomplete="reason" autofocus></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- end inputs -->
                            <!-- last one -->
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
            @can('qa_access')
            <div class="col-4">
                <div class="card card-success">
                    <div class="card-header" >
                        <strong>QA Call Record # {{ $calltracker->id }}</strong>
                    </div>

                    <div class="card-body">
                        @if(is_null($calltracker->qa_call_tracker_id))
                        <form action="{{ route('admin.qacalltracker.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @else
                        <div class="row">
                            <div class="col-12">
                                <p><strong>QA Agent:</strong><span style="font-style:italic; color:crimson; font-weight:900;" class="pl-4">{{ $calltracker->calltrackerQA->qa_name }}({{ $calltracker->calltrackerQA->qa_code }}) on {{ $calltracker->calltrackerQA->created_at }}</span></p>
                            </div>
                        </div>
                        <form action="{{ route('admin.qacalltracker.update', [$calltracker->qa_call_tracker_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @endif
                            <input type="hidden" name="calltracker_id" value="{{$calltracker->id ?? null }}"> </input>
                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select Call Status" for="call_status" class="col-md-4 col-form-label text-md-left">Call Status:</label>

                                <div class="col-md-8">
                                    <select class="form-control select2" name="call_status" data-width="100%" id="call_status">
                                        <option value="">Select a call status</option>
                                        <option {{ !(is_null($calltracker->calltrackerQA)) && $calltracker->calltrackerQA->call_status == 'Complete' ? 'selected' : '' }} value="Complete">Complete</option>
                                        <option {{ !(is_null($calltracker->calltrackerQA)) && $calltracker->calltrackerQA->call_status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select QA Status" for="qa_status" class="col-md-4 col-form-label text-md-left">QA Status:</label>

                                <div class="col-md-8">
                                    <select class="form-control select2" name="qa_status" data-width="100%" id="qa_status">
                                        <option value="">Select a qa status</option>
                                        <option {{ isset($calltracker->calltrackerQA) && $calltracker->calltrackerQA->qa_status == 'Compliant' ? 'selected' : '' }} value="Compliant">Compliant</option>
                                        <option {{ isset($calltracker->calltrackerQA) && $calltracker->calltrackerQA->qa_status == 'Non-Compliant' ? 'selected' : '' }} value="Non-Compliant">Non-Compliant</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s1a">
                                <label data-toggle="tooltip" title="Select QA Outcome" for="qa_outcome" class="col-md-4 col-form-label text-md-left">QA Outcome:</label>

                                <div class="col-md-8">
                                    <select class="form-control select2" name="qa_outcome" data-width="100%" id="qa_outcome">
                                        <option value="">Select a qa outcome</option>
                                        <option {{ isset($calltracker->calltrackerQA) && $calltracker->calltrackerQA->qa_outcome == "Compliant" ? 'selected' : '' }} value="Call Management">Call Management</option>
                                        <option {{ isset($calltracker->calltrackerQA) && $calltracker->calltrackerQA->qa_outcome == "Compliant Call" ? 'selected' : '' }} value="Compliant Call">Compliant Call</option>
                                        <option {{ isset($calltracker->calltrackerQA) && $calltracker->calltrackerQA->qa_outcome == "Customer Focus"  ? 'selected' : '' }} value="Customer Focus">Customer Focus</option>
                                        <option {{ isset($calltracker->calltrackerQA) && $calltracker->calltrackerQA->qa_outcome == "Process and Procedures" ? 'selected' : '' }} value="Process and Procedures">Process and Procedures</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row s2">
                                    <label data-toggle="tooltip" title="You must enter details" for="qa_comments" class="col-md-4 col-form-label text-md-left">QA Comments:</label>

                                    <div class="col-md-8">
                                        <textarea style="height:200px;" id="qa_comments" type="text" class="form-control" name="qa_comments" value="" autofocus>{{  $calltracker->calltrackerQA->qa_comments ?? null }}</textarea>
                                    </div>
                                </div>
                            

                            <div>
                                <input class="btn btn-success" type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @endcan
        </div>
    </div>
</section>

@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
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

        var subcat = "{{ $calltracker->sub_category }}";
        sub_category_handler(subcat);
    });
</script>
@endsection