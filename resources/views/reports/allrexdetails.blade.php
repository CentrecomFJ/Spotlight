@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Rex Entry List - By Date Range </h1>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 offset-4">
                                <form id="date-range" action="{{ route('admin.report.listalloodie') }}">
                                    @csrf
                                    <input type="hidden" name="startdate" id="startdate">
                                    <input type="hidden" name="enddate" id="enddate">
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="listing-dates">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="datatable-FaqCategory" class="table table-bordered table-striped table-hover datatable datatable-FaqCategory">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Request Type
                                        </th>
                                        <th>
                                            Ref No
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Time
                                        </th>
                                        <th>
                                            First name
                                        </th>
                                        <th>
                                            Last name
                                        </th>
                                        <th>
                                            Primary phone
                                        </th>
                                        <th>
                                            Secondary phone
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Comments
                                        </th>
                                        <th>
                                            Travel Agent Booking
                                        </th>
                                        <th>
                                            Booking Reference
                                        </th>
                                        <th>
                                            Passenger firstname
                                        </th>
                                        <th>
                                            Passenger lastname
                                        </th>
                                        <th>
                                            Whole Booking
                                        </th>
                                        <th>
                                            Flight within 24 hours?
                                        </th>
                                        <th>
                                            Credit Request?
                                        </th>
                                        <th>
                                            Disposition
                                        </th>
                                        <th>
                                            Agent
                                        </th>
                                        <th>
                                            Created At
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rextracker as $key => $entry)
                                    <tr data-entry-id="{{ $entry->id }}">
                                        <td>
                                            {{ $entry->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->request_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->ref_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->entry_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->entry_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->fname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->lname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->primary_phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->secondary_phone  ?? ''}}
                                        </td>
                                        <td>
                                            {{ $entry->email_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->comments ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->ta_booking ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->booking_ref ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->pass_fname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->pass_lname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->whole_booking ?? '' }}@if($entry->whole_booking=="Other")-{{ $entry->other_booking }}@endif
                                        </td>
                                        <td>
                                            {{ $entry->flight_24hrs ?? ''}}
                                        </td>
                                        <td>
                                            {{ $entry->credit_req ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->disposition ?? ''}}
                                        </td>
                                        <td>
                                            {{ $entry->agent ?? ''}}
                                        </td>
                                        <td>
                                            {{ $entry->created_at ?? ''}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
@parent
<script>
    $(function() {

        $("#datatable-FaqCategory").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "scrollX": true
            , "buttons": ["excel"]
        }).buttons().container().appendTo('#datatable-FaqCategory_wrapper .col-md-6:eq(0)');


        //Date range picker
        $('#listing-dates').daterangepicker();

        //handler
        $('#listing-dates').on('apply.daterangepicker', function(ev, picker) {
            let startdate = picker.startDate.format('YYYY-MM-DD');
            let enddate = picker.endDate.format('YYYY-MM-DD');

            $("#startdate").val(startdate);
            $("#enddate").val(enddate);

            $("#date-range").submit();
        });
    });

</script>
@endsection
