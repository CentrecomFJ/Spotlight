@extends('layouts.adminlte')

@section('content')
<!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.js"></script>
	 -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Media Listing Tabular View</h1>
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
                    <!-- <div class="card-header">
                        <strong>{{ trans('global.create') }} {{ trans('cruds.appraisal.title_singular') }}</strong>
                    </div> -->

                    <div class="card-body">
                        <p>The following table shows all media you have uploaded in a table form <br>
                            You can use the search box to filter by name eg enter bov , date eg enter 2020-07-03, extension eg enter .pdf etc.
                        </p>
                        <div class="table-responsive">
                            <table id="datatable-media-listing" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Document</th>
                                        <th>Shareable Url</th>
                                        <th>Upload Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $datas)
                                    <tr>
                                        <td>
                                            <a href="{{asset('/kb_images/'.$datas->document_alias)}}"> <i class="fa fa-database" aria-hidden="true"></i> {{$datas->document_name ?? 'unknown'}}</a>
                                        </td>
                                        <td>
                                            <a href="{{asset('/kb_images/'.$datas->document_alias)}}"> {{asset('/kb_images/'.$datas->document_alias)}} </a>
                                        </td>
                                        <td>
                                            {{$datas->created_at}}
                                        </td>
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
        $(".alert-success").fadeOut(3000);

        $("#datatable-media-listing").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        //.buttons().container().appendTo('#datatable-media-listing_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection