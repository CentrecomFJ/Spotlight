@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.show') }} Assignee</h1>
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
                        {{ trans('global.show') }} Assignee
                    </div> -->

                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                         ID
                                        </th>
                                        <td>
                                            {{ $assignee->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Name
                                        </th>
                                        <td>
                                            {{ $assignee->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Email
                                        </th>
                                        <td>
                                            {{ $assignee->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Telephone
                                        </th>
                                        <td>
                                            {{ $assignee->telephone_num }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Mobile
                                        </th>
                                        <td>
                                            {{$assignee->mobile_num }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Created at
                                        </th>
                                        <td>
                                            {{ $assignee->full_text }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection