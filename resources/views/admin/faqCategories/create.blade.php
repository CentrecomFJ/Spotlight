@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.create') }} {{ trans('cruds.faqCategory.title_singular') }}</h1>
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
        {{ trans('global.create') }} {{ trans('cruds.faqCategory.title_singular') }}
    </div> -->
                    <div class="card-body">
                        <form action="{{ route("admin.faq-categories.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                <label for="category">{{ trans('cruds.faqCategory.fields.category') }}*</label>
                                <input type="text" id="category" name="category" class="form-control" value="{{ old('category', isset($faqCategory) ? $faqCategory->category : '') }}" required>
                                @if($errors->has('category'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.faqCategory.fields.category_helper') }}
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