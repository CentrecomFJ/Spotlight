@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.show') }} Helpdesk Entry</h1>
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
                         Reference# {{ $helpdesktracker->ref_no }}
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
                                            {{ $helpdesktracker->ref_no ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Date
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->call_date ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Time
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->call_time ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->customer_name ?? ''}} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Address
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->address ?? '' }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Direction
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->call_direction ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Disposition
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->call_disposition  ?? ''}} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Escalation
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->escalation ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Enquiry
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->customer_enquiry ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Created by
                                        </th>
                                        <td>
                                            {{ $helpdesktracker->agent->employee_code ?? ''}} |  {{ $helpdesktracker->agent->name ?? '' }} on {{ $helpdesktracker->created_at ?? ''}}
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