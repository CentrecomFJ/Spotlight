@extends('layouts.adminlte')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Helpdesk Entry List</h1>
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
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.helpdesktracker.create') }}">
                            Create Helpdesk Entry
                        </a>
                    </div>
                </div>
                @endcan
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-FaqCategory" class="table table-bordered table-striped table-hover datatable datatable-FaqCategory">
                                <thead>
                                    <tr>
                                        <th>
                                           ID
                                        </th>
                                        <th>
                                           Refno
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
                                            Agent Code
                                        </th>
                                        <th>
                                            Agent Name
                                        </th>
                                        <th>
                                           Created_date
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($entries as $key => $entry)
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
                                            {{ $entry->call_disposition ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->agent->employee_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->agent->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->created_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('call_entries_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.helpdesktracker.show', $entry->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                            @endcan

                                            @can('call_entries_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.helpdesktracker.edit', $entry->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endcan

                                            @can('call_entries_delete')
                                            <form action="{{ route('admin.helpdesktracker.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                            @endcan

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
            "buttons": ["excel"],
            "order":[[0, "desc"]]
        }).buttons().container().appendTo('#datatable-FaqCategory_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection