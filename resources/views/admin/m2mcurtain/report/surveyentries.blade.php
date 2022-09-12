@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Survey Entries</h1>
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
                    <div class="card-body">
                    <div class="table-responsive">
                            <table id="datatable-Entries" class="table table-bordered table-hover datatable-Entries">
                                <thead>
                                    <tr>
                                        @foreach($custom_survey_questions as $id=>$custom_survey_question)
                                        <th>{{ $custom_survey_question->question ?? '' }}</th>
                                        @endforeach
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($custom_survey_entries as $entries)
                                    <tr>
                                        @foreach($entries as $ans)
                                        <td>{{ $ans  ?? ''}}</td>
                                        @endforeach  
                                    </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    $(document).ready(function() {
        $("#datatable-Entries").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "buttons": ["excel"]
        }).buttons().container().appendTo('#datatable-Entries_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection