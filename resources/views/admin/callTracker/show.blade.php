@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.show') }} Call Entry</h1>
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
                <div class="card">
                    <div class="card-header">
                         Reference# {{ $calltracker->refno }}
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped table-sm">
                                <tbody>
                                    <tr>
                                        <th>
                                            Ref No
                                        </th>
                                        <td>
                                            {{ $calltracker->refno }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Skill
                                        </th>
                                        <td>
                                            {{ $calltracker->skill }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Category
                                        </th>
                                        <td>
                                            {{ $calltracker->category }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Full name
                                        </th>
                                        <td>
                                            {{ $calltracker->firstname }} {{ $calltracker->lastname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Address
                                        </th>
                                        <td>
                                            {{ $calltracker->streetnum }} {{ $calltracker->streetname }} {{ $calltracker->suburb }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Area
                                        </th>
                                        <td>
                                            {{ $calltracker->town_city }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Mobile / Alternate
                                        </th>
                                        <td>
                                            {{ $calltracker->mobile }} / {{ $calltracker->alt_contact }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Postal
                                        </th>
                                        <td>
                                            {{ $calltracker->postal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <td>
                                            {{ $calltracker->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            DL Num
                                        </th>
                                        <td>
                                            {{ $calltracker->dl_num }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            CL Reference Num
                                        </th>
                                        <td>
                                            {{ $calltracker->clr_num }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Subcategory
                                        </th>
                                        <td>
                                            {{ $calltracker->sub_category }}
                                        </td>
                                    </tr>

                                    @if($calltracker->sub_category == "Enquiry")
                                    <tr>
                                        <th>
                                            Comments
                                        </th>
                                        <td>
                                            {{ $calltracker->enquiry_comments }}
                                        </td>
                                    </tr>
                                    @endif

                                    @if($calltracker->sub_category == "Escalations")
                                    <tr>
                                        <th>
                                            Escalation Department
                                        </th>
                                        <td>
                                            {{ $calltracker->escalation_department }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Escalation Contact Person
                                        </th>
                                        <td>
                                            {{ $calltracker->escalation_person_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Escalation Outcome
                                        </th>
                                        <td>
                                            {{ $calltracker->escalation_outcome }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Call Disposition
                                        </th>
                                        <td>
                                            {{ $calltracker->escalation_call_disposition }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Comment
                                        </th>
                                        <td>
                                            {{ $calltracker->escalation_comments }}
                                        </td>
                                    </tr>
                                    @endif

                                    @if($calltracker->sub_category == "Complaints")
                                    <tr>
                                        <th>
                                            Complaint Type
                                        </th>
                                        <td>
                                            {{ $calltracker->complaint_type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Complaint Ticket
                                        </th>
                                        <td>
                                            {{ $calltracker->complaint_ticket }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Comments
                                        </th>
                                        <td>
                                            {{ $calltracker->complaint_comments }}
                                        </td>
                                    </tr>
                                    @endif

                                    <tr>
                                        <th>
                                           Created by
                                        </th>
                                        <td>
                                            {{ $calltracker->user_id }} |  {{ $calltracker->user_name }} on {{ $calltracker->created_at }}
                                        </td>
                                    </tr>                                    

                                </tbody>
                            </table>
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>

                        <nav class="mb-3">
                            <div class="nav nav-tabs">

                            </div>
                        </nav>
                        <div class="tab-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection