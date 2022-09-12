@extends('layouts.adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Disciplinary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Disciplinary</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @can('disciplinary_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.disciplinary.create") }}">
                        {{ trans('global.add') }} {{ trans('cruds.disciplinary.title_singular') }}
                    </a>
                </div>
            </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    <strong>{{ trans('cruds.disciplinary.title_singular') }} {{ trans('global.list') }}</strong>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-Disciplinary" class="table table-bordered table-striped table-hover datatable datatable-Disciplinary">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.disciplinary.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.disciplinary.fields.agent_id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.disciplinary.fields.agent_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.disciplinary.fields.account_id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.disciplinary.fields.disciplinary_action_id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.disciplinary.fields.issued_by') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($disciplinaries as $key => $disciplinary)
                                <tr data-entry-id="{{ $disciplinary->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $disciplinary->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $disciplinary->agent_id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $disciplinary->agent_name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $disciplinary->account->account_name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $disciplinary->disciplinaryAction->action_name  ?? '' }}
                                    </td>
                                    <td>
                                        {{ $disciplinary->issued_by }}
                                    </td>
                                    <td>
                                        @can('disciplinary_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.disciplinary.show', $disciplinary->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan

                                        @can('disciplinary_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.disciplinary.edit', $disciplinary->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                        @endcan

                                        @can('disciplinary_delete')
                                        <form action="{{ route('admin.disciplinary.destroy', $disciplinary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        // let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        // @can('disciplinary_delete')
        // let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        // let deleteButton = {
        //     text: deleteButtonTrans,
        //     url: "{{ route('admin.disciplinary.massDestroy') }}",
        //     className: 'btn-danger',
        //     action: function(e, dt, node, config) {
        //         var ids = $.map(dt.rows({
        //             selected: true
        //         }).nodes(), function(entry) {
        //             return $(entry).data('entry-id')
        //         });

        //         if (ids.length === 0) {
        //             alert('{{ trans('global.datatables.zero_selected') }}')

        //             return
        //         }

        //         if (confirm('{{ trans('global.areYouSure') }}')) {
        //             $.ajax({
        //                     headers: {
        //                         'x-csrf-token': _token
        //                     },
        //                     method: 'POST',
        //                     url: config.url,
        //                     data: {
        //                         ids: ids,
        //                         _method: 'DELETE'
        //                     }
        //                 })
        //                 .done(function() {
        //                     location.reload()
        //                 })
        //         }
        //     }
        // }
        // dtButtons.push(deleteButton)
        // @endcan

        // $.extend(true, $.fn.dataTable.defaults, {
        //     order: [
        //         [1, 'desc']
        //     ],
        //     pageLength: 100,
        // });
        // $('.datatable-Disciplinary:not(.ajaxTable)').DataTable({
        //     buttons: dtButtons
        // })

        $("#datatable-Disciplinary").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-Disciplinary_wrapper .col-md-6:eq(0)');
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
    
        // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        // $($.fn.dataTable.tables(true)).DataTable()
        //     .columns.adjust();
        // });
    })
</script>
@endsection