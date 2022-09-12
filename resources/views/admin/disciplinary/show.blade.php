@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Disciplinary Record</h1>
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
                    <div class="card-header">
                        <strong>{{ trans('global.show') }} {{ trans('cruds.disciplinary.title_singular') }}</strong>
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $disciplinary->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.agent_id') }}
                                        </th>
                                        <td>
                                            {{ $disciplinary->agent_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.agent_name') }}
                                        </th>
                                        <td>
                                            {{ $disciplinary->agent_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.account_id') }}
                                        </th>
                                        <td>
                                            {!! $disciplinary->account->account_name !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.disciplinary_action_id') }}
                                        </th>
                                        <td>
                                            {!! $disciplinary->disciplinaryAction->action_name !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.sub_category') }}
                                        </th>
                                        <td>
                                            {!! $disciplinary->sub_category !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.disciplinary.fields.issued_by') }}
                                        </th>
                                        <td>
                                            {{ $disciplinary->issued_by }}
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