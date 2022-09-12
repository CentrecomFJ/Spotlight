@extends('layouts.adminlte')

@section('title', $ticket->title)

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ticket - {{ $ticket->id }} - {{ $ticket->title }}</h1>
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
                    <!-- <div class="card-header">
                        Ticket - {{ $ticket->id }} - {{ $ticket->title }}
                    </div> -->
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="ticket-info">
                            <p>
                                <span class="pull-right">{{$ticket->user->name}} on {{ $ticket->created_at }}</span>
                                <br>
                                <br>
                                {!! $ticket->message !!}
                            </p>
                            <p>Category: {{ $ticket->ticketCategory->name }}</p>
                            <p>
                                @if ($ticket->status === 'Open')
                                Status: <span class="label label-success">{{ $ticket->status }}</span>
                                @else
                                Status: <span class="label label-danger">{{ $ticket->status }}</span>
                                @endif
                            </p>
                            <!-- <p>Created by {{$ticket->user->name}} on {{ $ticket->created_at }}</p> -->
                        </div>
                        <hr>
                        @include('admin.ticket.comments')
                        <hr>
                        @include('admin.ticket.reply')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection