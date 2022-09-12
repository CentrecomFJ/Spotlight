@extends('layouts.adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>M2M Listing</h1>
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
                    @can('call_entries_create')
                        {{-- <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.covidtracker.create') }}">
                            Create Helpdesk Entry
                        </a>
                    </div>
                </div> --}}
                    @endcan
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="row">
                            <div class="col-4 offset-4">
                                <form>
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
                        <hr> --}}

                            <div class="table-responsive">
                                <table id="datatable-CovidEntries"
                                    class="table table-bordered table-striped table-hover datatable datatable-CovidEntries">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Phone Number
                                            </th>
                                            <th>
                                                Customer Name
                                            </th>
                                            <th>
                                                Surburb
                                            </th>
                                            <th>
                                                Lead Date
                                            </th>
                                            <th>
                                                Division
                                            </th>
                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($entries as $key => $entry)
                                            <tr data-entry-id="{{ $entry->id }}">
                                                <td>
                                                    {{ $entry->id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $entry->phone_num ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $entry->contact_name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $entry->surburb ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $entry->lead_date ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $entry->division ?? '' }}
                                                </td>


                                                <td>
                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.m2mcurtain.edit', $entry->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
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

            var dataTable = $('#datatable-CovidEntries').DataTable({
                processing: true,
                serverSide: false,
                autoWidth: false,
                pageLength: 200,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ]
            });

            //Date range picker
            // $('#listing-dates').daterangepicker();
            // //handler
            // $('#listing-dates').on('apply.daterangepicker', function(ev, picker) {
            //     let startdate = picker.startDate.format('YYYY-MM-DD');
            //     let enddate = picker.endDate.format('YYYY-MM-DD');

            //     $("#startdate").val(startdate);
            //     $("#enddate").val(enddate);

            //     // $("#date-range").submit();
            //     dataTable.draw();
            // });

            /*
            $("#datatable-FaqCategory").DataTable({
                "responsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "buttons": ["excel"]
                , "order": [
                    [0, "desc"]
                ]
            }).buttons().container().appendTo('#datatable-FaqCategory_wrapper .col-md-6:eq(0)'); 
            */
        });
    </script>
@endsection
