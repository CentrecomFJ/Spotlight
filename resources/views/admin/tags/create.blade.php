@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Tag</h1>
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
        {{ trans('global.create') }} {{ trans('cruds.tag.title_singular') }}
    </div> -->

                    <div class="card-body">
                        <form action="{{ route("admin.tags.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">{{ trans('cruds.tag.fields.name') }}*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($tag) ? $tag->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.tag.fields.name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                <label for="slug">{{ trans('cruds.tag.fields.slug') }}*</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($tag) ? $tag->slug : '') }}" required>
                                @if($errors->has('slug'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.tag.fields.slug_helper') }}
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
    $('input[name="name"]').change(function(e) {
        $.get("{{ route('kb.tags.check_slug') }}", {
                'name': $(this).val()
            },
            function(data) {
                $('input[name="slug"]').val(data.slug);
            }
        );
    });
</script>
@endsection