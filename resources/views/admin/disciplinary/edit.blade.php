@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.edit') }} {{ trans('cruds.disciplinary.title_singular') }}</h1>
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
                        <strong>{{ trans('global.edit') }} {{ trans('cruds.disciplinary.title_singular') }}</strong>
                    </div> -->

                    <div class="card-body">
                        <form action="{{ route("admin.disciplinary.update", [$disciplinary->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('disciplinary_type') ? 'has-error' : '' }}">
                                <label for="disciplinary_type">Type</label>
                                <select name="disciplinary_type" id="disciplinary_type" class="form-control select2">
                                    @foreach($disciplinary_types as $key => $disciplinary_type)
                                    <option value="{{ $key }}" {{ isset($disciplinary) && $disciplinary->disciplinary_type == $key ? 'selected' : '' }}>{{ $disciplinary_type }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('disciplinary_type'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('disciplinary_type') }}
                                </em>
                                @endif
                                <!-- <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.account_id_helper') }}
                                </p> -->
                            </div>
                            <div class="form-group {{ $errors->has('agent_id') ? 'has-error' : '' }}">
                                <label for="agent_id">{{ trans('cruds.disciplinary.fields.agent_id') }}</label>
                                <input type="text" id="agent_id" name="agent_id" class="form-control" value="{{ old('agent_id', isset($disciplinary) ? $disciplinary->agent_id : '') }}" required>
                                @if($errors->has('agent_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('agent_id') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.agent_id_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('agent_name') ? 'has-error' : '' }}">
                                <label for="agent_name">{{ trans('cruds.disciplinary.fields.agent_name') }}</label>
                                <input type="text" id="agent_name" name="agent_name" class="form-control" value="{{ old('agent_name', isset($disciplinary) ? $disciplinary->agent_name : '') }}" required>
                                @if($errors->has('agent_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('agent_name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.agent_name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('account_id') ? 'has-error' : '' }}">
                                <label for="account_id">{{ trans('cruds.disciplinary.fields.account_id') }}</label>
                                <select name="account_id" id="account_id" class="form-control select2">
                                    @foreach($account as $id => $account_name)
                                    <option value="{{ $id }}" {{ (old('account_id', 0) == $id || isset($disciplinary) && $disciplinary->account_id == $id) ? 'selected' : '' }}>{{ $account_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('account_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('account_id') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.account_id_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('disciplinary_action_id') ? 'has-error' : '' }}">
                                <label for="disciplinary_action_id">{{ trans('cruds.disciplinary.fields.disciplinary_action_id') }}</label>
                                <select name="disciplinary_action_id" id="disciplinary_action_id" class="form-control select2">
                                    @foreach($disciplinaryAction as $id => $action_name)
                                    <option value="{{ $id }}" {{ (old('disciplinary_action_id', 0) == $id || isset($disciplinary) && $disciplinary->disciplinary_action_id == $id) ? 'selected' : '' }}>{{ $action_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('disciplinary_action_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('disciplinary_action_id') }}
                                </em>disciplinary_action_id
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.account_id_helper') }}
                                </p>
                            </div>


                            <div id="sub-cactegory-div" class="form-group {{ $errors->has('sub_category') ? 'has-error' : '' }}" style="display:none;">
                                <label for="sub_category">{{ trans('cruds.disciplinary.fields.sub_category') }}</label>
                                <textarea id="sub_category" name="sub_category" class="form-control ">{{ old('sub_category', isset($disciplinary) ? $disciplinary->sub_category : '') }}</textarea>
                                @if($errors->has('sub_category'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('sub_category') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.sub_category_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                                <label for="comment">Comments</label>
                                <textarea id="comment" name="comment" class="form-control ">{{ old('comment', isset($disciplinary) ? $disciplinary->comment : '') }}</textarea>
                                @if($errors->has('comment'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </em>
                                @endif
                                <!-- <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.sub_category_helper') }}
                                </p> -->
                            </div>


                            <div class="form-group {{ $errors->has('issued_by') ? 'has-error' : '' }}">
                                <label for="issued_by">{{ trans('cruds.disciplinary.fields.issued_by') }}</label>
                                <input type="text" id="issued_by" name="issued_by" class="form-control" value="{{ old('issued_by', isset($disciplinary) ? $disciplinary->agent_id : '') }}" required>
                                @if($errors->has('issued_by'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('issued_by') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.disciplinary.fields.issued_by_helper') }}
                                </p>
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
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $('#disciplinary_action_id').on('select2:select', function(e) {
            var data = e.params.data;
            if (data.id == 16) {
                $("#sub-cactegory-div").show();
            } else {
                $("#sub-cactegory-div").hide();
            }
        });

    });
</script>
@endsection