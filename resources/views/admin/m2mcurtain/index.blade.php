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

                    <div class="card">
                        <div class="card-body">

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
        });
    </script>
@endsection
