@extends('layouts.adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appraisal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Appraisal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @can('appraisal_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.appraisal.create") }}">
                        <strong>{{ trans('global.add') }} {{ trans('cruds.appraisal.title_singular') }}</strong>
                    </a>
                </div>
            </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    <strong>{{ trans('cruds.appraisal.title_singular') }} {{ trans('global.list') }}</strong>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id ="datatable-Appraisal" class="table table-bordered table-hover datatable-Appraisal">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.agent_id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.agent_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.account_id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.review_type_id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.review_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.appraisal.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appraisals as $key => $appraisal)
                                <tr data-entry-id="{{ $appraisal->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $appraisal->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $appraisal->agent_id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $appraisal->agent_name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $appraisal->account->account_name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $appraisal->reviewType->review_name  ?? '' }}
                                    </td>
                                    <td>
                                        {{ $appraisal->review_date }}
                                    </td>
                                    <td>
                                        {{ $appraisal->status }}
                                    </td>
                                    <td>
                                        @can('appraisal_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.appraisal.show', $appraisal->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('appraisal_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.appraisal.edit', $appraisal->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('appraisal_delete')
                                                <form action="{{ route('admin.appraisal.destroy', $appraisal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        $("#datatable-Appraisal").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-Appraisal_wrapper .col-md-6:eq(0)');
        // let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        // @can('appraisal_delete')

        //   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        //   let deleteButton = {
        //     text: deleteButtonTrans,
        //     url: "{{ route('admin.appraisal.massDestroy') }}",
        //     className: 'btn-danger',
        //     action: function (e, dt, node, config) {
        //       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
        //           return $(entry).data('entry-id')
        //       });

        //       if (ids.length === 0) {
        //         alert('{{ trans('global.datatables.zero_selected') }}')

        //         return
        //       }

        //       if (confirm('{{ trans('global.areYouSure') }}')) {
        //         $.ajax({
        //           headers: {'x-csrf-token': _token},
        //           method: 'POST',
        //           url: config.url,
        //           data: { ids: ids, _method: 'DELETE' }})
        //           .done(function () { location.reload() })
        //       }
        //     }
        //   }
        //   dtButtons.push(deleteButton)

        // @endcan

        // $.extend(true, $.fn.dataTable.defaults, {
        //     order: [
        //         [1, 'desc']
        //     ],
        //     pageLength: 100,
        // });
        // $('.datatable-Appraisal:not(.ajaxTable)').DataTable({
        //     buttons: dtButtons
        // })
        // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust();
        // });
    })
</script>
@endsection