@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Import and Export CSV & Excel to Database
    </div>

    <div class="card-body">
        <form action="{{ route('admin.import-export.fileImport') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
            <a class="btn btn-success" href="{{ route('admin.import-export.fileExport') }}">Export data</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- <script>
  $('input[name="title"]').change(function(e) {
    $.get('{{ route('kb.articles.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('input[name="slug"]').val(data.slug);
      }
    );
  });
</script> -->
@endsection