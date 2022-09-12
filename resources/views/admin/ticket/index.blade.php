@extends('layouts.adminlte')

@section('title', 'All Tickets')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Tickets</h1>
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
                @can('ticket_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.tickets.create-ticket') }}">
                            Create New Ticket
                        </a>
                    </div>
                </div>
                @endcan
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-ticket"></i> Support Ticket List
                    </div>
                    <div class="card-body">
                        @if ($tickets->isEmpty())
                        <p>There are currently no tickets.</p>
                        @else

                        <div class="table-responsive">
                            <table id="datatable-Tickets" class="table table-bordered table-striped table-hover datatable datatable-Tickets">
                                <thead>
                                    <tr>
                                        <th width="10"></th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Last Updated</th>
                                        <th style="text-align:center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                    <tr data-entry-id="{{ $ticket->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $ticket->ticketCategory->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/'. $ticket->id) }}">
                                                #{{ $ticket->id }} - {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($ticket->status === 'Open')
                                            <span class="badge badge-success">{{ $ticket->status }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $ticket->updated_at }}</td>
                                        <td>
                                            @if($ticket->status === 'Open')
                                            <a href="{{ url('tickets/' . $ticket->id) }}" class="btn btn-xs btn-primary">Comment</a>

                                            <form action="{{ url('tickets/close/' . $ticket->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-xs btn-danger">Close</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- {{ $tickets->render() }} -->
                        </div>
                        @endif
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
        //   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        //   let deleteButton = {
        //     text: deleteButtonTrans,
        //     url: "{{ route('admin.disciplinary.massDestroy') }}",
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
        // $('.datatable-Tickets:not(.ajaxTable)').DataTable({
        //     buttons: dtButtons
        // })
        // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust();
        // });

        $("#datatable-Tickets").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable-Tickets_wrapper .col-md-6:eq(0)');
    })
</script>
@endsection