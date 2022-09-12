@extends('layouts.adminlte')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.create') }} Assignee</h1>
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
                        {{ trans('global.create') }} Assignee
                    </div> -->
                    {{  dd(ticket_categories) }}
                    <div class="card-body">
                        <form action="{{ route("admin.assignee.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Name*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($assignee) ? $assignee->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    <!-- {{ trans('cruds.article.fields.title_helper') }} -->
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('name', isset($assignee) ? $assignee->email : '') }}" required>
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    <!-- {{ trans('cruds.article.fields.title_helper') }} -->
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('telephone_num') ? 'has-error' : '' }}">
                                <label for="telephone_num">Telephone*</label>
                                <input type="text" id="telephone_num" name="telephone_num" class="form-control" value="{{ old('telephone_num', isset($assignee) ? $assignee->telephone_num : '') }}">
                                @if($errors->has('telephone_num'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('telephone_num') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    <!-- {{ trans('cruds.article.fields.title_helper') }} -->
                                </p>
                            </div>
 
                            <div class="form-group {{ $errors->has('mobile_num') ? 'has-error' : '' }}">
                                <label for="mobile_num">Mobile*</label>
                                <input type="text" id="mobile_num" name="mobile_num" class="form-control" value="{{ old('mobile_num', isset($assignee) ? $assignee->mobile_num : '') }}">
                                @if($errors->has('mobile_num'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('mobile_num') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    <!-- {{ trans('cruds.article.fields.title_helper') }} -->
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
@parent
<script>

</script>
@endsection