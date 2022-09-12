@extends('layouts.adminlte')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('cruds.faqQuestion.title_singular') }} {{ trans('global.list') }}</h1>
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
                @can('faq_question_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route("admin.faq-questions.create") }}">
                            {{ trans('global.add') }} {{ trans('cruds.faqQuestion.title_singular') }}
                        </a>
                    </div>
                </div>
                @endcan

                <div class="card">
                    <!-- <div class="card-header">
                        {{ trans('cruds.faqQuestion.title_singular') }} {{ trans('global.list') }}
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-FaqQuestion" class=" table table-bordered table-striped table-hover datatable datatable-FaqQuestion">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.faqQuestion.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.faqQuestion.fields.category') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.faqQuestion.fields.question') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.faqQuestion.fields.answer') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($faqQuestions as $key => $faqQuestion)
                                    <tr data-entry-id="{{ $faqQuestion->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $faqQuestion->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $faqQuestion->category->category ?? '' }}
                                        </td>
                                        <td>
                                            {{ $faqQuestion->question ?? '' }}
                                        </td>
                                        <td>
                                            {{ $faqQuestion->answer ?? '' }}
                                        </td>
                                        <td>
                                            @can('faq_question_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.faq-questions.show', $faqQuestion->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                            @endcan

                                            @can('faq_question_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.faq-questions.edit', $faqQuestion->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endcan

                                            @can('faq_question_delete')
                                            <form action="{{ route('admin.faq-questions.destroy', $faqQuestion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        $("#datatable-FaqQuestion").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-FaqQuestion_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection