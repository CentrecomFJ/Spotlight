@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Appraisal Record</h1>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <strong>{{ trans('global.edit') }} {{ trans('cruds.appraisal.title_singular') }}</strong>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.appraisal.update", [$appraisal->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('agent_id') ? 'has-error' : '' }}">
                                <label for="agent_id">{{ trans('cruds.appraisal.fields.agent_id') }}</label>
                                <input type="text" id="agent_id" name="agent_id" class="form-control" value="{{ old('agent_id', isset($appraisal) ? $appraisal->agent_id : '') }}" required>
                                @if($errors->has('agent_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('agent_id') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.appraisal.fields.agent_id_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('agent_name') ? 'has-error' : '' }}">
                                <label for="agent_name">{{ trans('cruds.appraisal.fields.agent_name') }}</label>
                                <input type="text" id="agent_name" name="agent_name" class="form-control" value="{{ old('agent_name', isset($appraisal) ? $appraisal->agent_name : '') }}" required>
                                @if($errors->has('agent_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('agent_name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.appraisal.fields.agent_name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('account_id') ? 'has-error' : '' }}">
                                <label for="account_id">{{ trans('cruds.appraisal.fields.account_id') }}</label>
                                <select name="account_id" id="account_id" class="form-control select2">
                                    @foreach($account as $id => $account_name)
                                    <option value="{{ $id }}" {{ (old('account_id', 0) == $id || isset($appraisal) && $appraisal->account_id == $id) ? 'selected' : '' }}>{{ $account_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('account_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('account_id') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.appraisal.fields.account_id_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('review_type_id') ? 'has-error' : '' }}">
                                <label for="review_type_id">{{ trans('cruds.appraisal.fields.review_type_id') }}</label>
                                <select name="review_type_id" id="review_type_id" class="form-control select2">
                                    @foreach($reviewType as $id => $type)
                                    <option value="{{ $id }}" {{ (old('review_type_id', 0) == $id || isset($appraisal) && $appraisal->review_type_id == $id) ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('review_type_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('review_type_id') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.appraisal.fields.review_type_id_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('review_date') ? 'has-error' : '' }}">
                                <label for="review_date">{{ trans('cruds.appraisal.fields.review_date') }}</label>
                                <input type="text" id="review_date" name="review_date" class="form-control" value="{{ old('review_date', isset($appraisal) ? $appraisal->review_date : '') }}" required>
                                @if($errors->has('review_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('review_date') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.appraisal.fields.review_date_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                <label for="status">{{ trans('cruds.appraisal.fields.status') }}</label>
                                <select name="status" id="status" class="form-control select2">
                                    <option value="">Select Reason</option>
                                    <option {{ $appraisal->status=='Pending'  ? 'selected' : '' }} value="Pending">Pending</option>
                                    <option {{ $appraisal->status=='Completed'  ? 'selected' : '' }} value="Completed">Completed</option>
                                    <option {{ $appraisal->status=='Extended'  ? 'selected' : '' }} value="Extended">Extended</option>

                                    <!--
                        <option value="" selected>Select Reason</option> 
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                        <option value="Extended">Extended</option> 
                    -->
                                </select>
                                @if($errors->has('status'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.appraisal.fields.status_helper') }}
                                </p>
                            </div>

                            <div id="extended-div" {{ $appraisal->status === "Extended" ? '' : "style='display: none;'" }}>

                                <div class="form-group {{ $errors->has('extended_reason') ? 'has-error' : '' }}">
                                    <label for="extended_reason">{{ trans('cruds.appraisal.fields.extended_reason') }}</label>
                                    <input type="text" id="extended_reason" name="extended_reason" class="form-control" value="{{ old('extended_reason', isset($appraisal) ? $appraisal->extended_reason : '') }}">
                                    @if($errors->has('extended_reason'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('extended_reason') }}
                                    </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.appraisal.fields.extended_reason_helper') }}
                                    </p>
                                </div>


                                <div class="form-group {{ $errors->has('extended_duration') ? 'has-error' : '' }}">
                                    <label for="extended_duration">{{ trans('cruds.appraisal.fields.extended_duration') }}</label>
                                    <input type="text" id="extended_duration" name="extended_duration" class="form-control" value="{{ old('extended_duration', isset($appraisal) ? $appraisal->extended_duration : '') }}">
                                    @if($errors->has('extended_duration'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('extended_duration') }}
                                    </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.appraisal.fields.extended_duration_helper') }}
                                    </p>
                                </div>

                                <div class="form-group {{ $errors->has('extended_status') ? 'has-error' : '' }}">
                                    <label for="extended_status">{{ trans('cruds.appraisal.fields.extended_status') }}</label>
                                    <select name="extended_status" id="extended_status" class="form-control select2">
                                        <option value="">Select Reason</option>
                                        <option {{ $appraisal->extended_status=='Passed-Submit'  ? 'selected' : '' }} value="Passed-Submit">Passed-Submit</option>
                                        <option {{ $appraisal->extended_status=='Failed'  ? 'selected' : '' }} value="Failed">Failed</option>
                                            <!--
                                                <option value="Passed-Submit">Passed-Submit</option>
                                                <option value="Failed">Failed</option>
                                            -->
                                    </select>
                                    @if($errors->has('extended_status'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('extended_status') }}
                                    </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.appraisal.fields.extended_status_helper') }}
                                    </p>
                                </div>

                            </div>

                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>
    $('#review_date').datepicker({
        format: 'yyyy-mm-dd',
    });

    $('#status').on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data);
        if (data.id == "Extended") {
            $("#extended-div").show();
        } else {
            $("#extended-div").hide();
        }
    });
</script>
@endsection