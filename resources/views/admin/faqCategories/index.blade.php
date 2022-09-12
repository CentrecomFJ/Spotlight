@extends('layouts.adminlte')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('cruds.faqCategory.title_singular') }} {{ trans('global.list') }}</h1>
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
                @can('faq_category_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route("admin.faq-categories.create") }}">
                            {{ trans('global.add') }} {{ trans('cruds.faqCategory.title_singular') }}
                        </a>
                    </div>
                </div>
                @endcan
                <div class="card">
                    <!-- <div class="card-header">
        {{ trans('cruds.faqCategory.title_singular') }} {{ trans('global.list') }}
    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-FaqCategory" class="table table-bordered table-striped table-hover datatable datatable-FaqCategory">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.faqCategory.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.faqCategory.fields.category') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($faqCategories as $key => $faqCategory)
                                    <tr data-entry-id="{{ $faqCategory->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $faqCategory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $faqCategory->category ?? '' }}
                                        </td>
                                        <td>
                                            @can('faq_category_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.faq-categories.show', $faqCategory->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                            @endcan

                                            @can('faq_category_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.faq-categories.edit', $faqCategory->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endcan

                                            @can('faq_category_delete')
                                            <form action="{{ route('admin.faq-categories.destroy', $faqCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-FaqCategory_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection