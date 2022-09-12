@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Call Entry List - By Date Range </h1>
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
                                <form id="date-range" action="{{ route('admin.report.listall') }}">
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
                                            #
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
                                           Name
                                        </th>
                                        <th>
                                          Address
                                        </th>
                                        <th>
                                            Direction
                                        </th>
                                        <th>
                                            Disposition
                                        </th>
                                        <th>
                                            Escalation
                                        </th>
                                        <th>
                                            Enquiry
                                        </th>
                                        <th>
                                            Agent Code
                                        </th>
                                        <th>
                                            Agent Name
                                        </th>
                                        <th>
                                            Created
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($calltracker as $key => $entry)
                                    <tr data-entry-id="{{ $entry->id }}">
                                        <td>
                                            {{ $entry->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->ref_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->customer_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->address ?? '' }} 
                                        </td>
                                        <td>
                                            {{ $entry->call_direction ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_disposition  ?? ''}} 
                                        </td>
                                        <td>
                                            {{ $entry->escalation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->customer_enquiry ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->agent->employee_code ?? ''}}
                                        </td>
                                        <td>
                                            {{ $entry->agent->name ?? '' }}
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
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel"]
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