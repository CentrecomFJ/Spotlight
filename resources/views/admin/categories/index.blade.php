@extends('layouts.adminlte')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('cruds.category.title_singular') }} {{ trans('global.list') }}</h1>
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
                @can('category_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route("admin.categories.create") }}">
                            {{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}
                        </a>
                    </div>
                </div>
                @endcan
                <div class="card">
                    <!-- <div class="card-header">
                        {{ trans('cruds.category.title_singular') }} {{ trans('global.list') }}
                    </div> -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-Category" class="table table-bordered table-striped table-hover datatable datatable-Category">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.category.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.category.fields.name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.category.fields.slug') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr data-entry-id="{{ $category->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $category->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $category->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $category->slug ?? '' }}
                                        </td>
                                        <td>
                                            @can('category_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $category->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                            @endcan

                                            @can('category_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.categories.edit', $category->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endcan

                                            @can('category_delete')
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        $("#datatable-Category").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-Category_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection