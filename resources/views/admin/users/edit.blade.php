@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}</h1>
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
                        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                    </div> -->
                    <div class="card-body">
                        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('employee_code') ? 'has-error' : '' }}">
                                <label for="employee_code">Employee Code*</label>
                                <input type="text" id="employee_code" name="employee_code" class="form-control" value="{{ old('employee_code', isset($user) ? $user->employee_code : '') }}" required>
                                @if($errors->has('employee_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('employee_code') }}
                                </em>
                                @endif
                                <!-- <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p> -->
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.email_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.password_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                    @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('roles'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.roles_helper') }}
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