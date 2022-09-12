@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Appraisal Record</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Appraisal id: {{ $appraisal->id }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <strong>{{ trans('global.show') }} {{ trans('cruds.appraisal.title_singular') }}</strong>
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.agent_id') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->agent_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.agent_name') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->agent_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.account_id') }}
                                        </th>
                                        <td>
                                            {!! $appraisal->account->account_name !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.review_type_id') }}
                                        </th>
                                        <td>
                                            {!! $appraisal->reviewType->review_name !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.review_date') }}
                                        </th>
                                        <td>
                                            {!! $appraisal->review_date !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.status') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->status }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.extended_reason') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->extended_reason }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.extended_duration') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->extended_duration }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.appraisal.fields.extended_status') }}
                                        </th>
                                        <td>
                                            {{ $appraisal->extended_status }}
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