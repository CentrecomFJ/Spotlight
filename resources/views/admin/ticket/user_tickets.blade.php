@extends('layouts.adminlte')

@section('title', 'My Tickets')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My Tickets</h1>
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
                <!-- start -->
                <div class="card">
                    <div class="card-body">
                        @if($tickets->isEmpty())
                        <p>You have not created any tickets.</p>
                        @else
                        <div class="table-responsive">
                            <table id="my-tickets" class="table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td>
                                            {{ $ticket->ticketCategory->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($ticket->status == "Open")
                                            <span class="badge badge-success">{{ $ticket->status }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $ticket->updated_at }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tickets->render() }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@parent
<script>
    $(function() {
        $("#my-tickets").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#my-tickets_wrapper .col-md-6:eq(0)');
    })
</script>
@endsection