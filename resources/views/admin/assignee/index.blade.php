@extends('layouts.adminlte')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Assignee {{ trans('global.list') }}</h1>
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
                @can('article_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route("admin.assignee.create") }}">
                            {{ trans('global.add') }} Assignee
                        </a>
                    </div>
                </div>
                @endcan
                <div class="card">
                    <!-- <div class="card-header">
                        Assignee {{ trans('global.list') }}
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-Assignee" class=" table table-bordered table-striped table-hover datatable datatable-Assignee">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Last Updated
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assignees as $key => $assignee)
                                    <tr data-entry-id="{{ $assignee->id }}">
                                        <td>
                                            {{ $assignee->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assignee->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assignee->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assignee->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('article_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.assignee.show', $assignee->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                            @endcan

                                            @can('article_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.assignee.edit', $assignee->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endcan

                                            @can('article_delete')
                                            <form action="{{ route('admin.assignee.destroy', $assignee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        $("#datatable-Assignee").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-Assignee_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection