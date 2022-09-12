@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>QA Call Entries - List</h1>
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
                            <table id="datatable-FaqCategory" class="table table-bordered table-striped table-hover datatable datatable-FaqCategory">
                                <thead>
                                    <tr>
                                        <th>
                                            Refnum
                                        </th>
                                        <th>
                                            Call Agent
                                        </th>
                                        <th>
                                            Call Status
                                        </th>
                                        <th>
                                            QA Status
                                        </th>
                                        <th>
                                            QA Outcome
                                        </th>
                                        <th>
                                            QA Comments
                                        </th>
                                        <th>
                                            QA Agent
                                        </th>
                                        <th>
                                            QA Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($calltracker as $key => $entry)
                                    <tr data-entry-id="{{ $entry->id }}">
                                        <td>
                                            {{ $entry->ref_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->agent->name ?? '' }} ({{ $entry->agent->employee_code ?? '' }})
                                        </td>
                                        <td>
                                            {{ $entry->calltrackerQA->call_status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->calltrackerQA->qa_status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->calltrackerQA->qa_outcome ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->calltrackerQA->qa_comments ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->calltrackerQA->qa_name ?? '' }} ({{ $entry->calltrackerQA->qa_code ?? '' }})
                                        </td>
                                        <td>
                                            {{ $entry->calltrackerQA->created_at ?? '' }}
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
    $(function() {

        $("#datatable-FaqCategory").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel"],
            "order": [
                [7, "desc"]
            ]
        }).buttons().container().appendTo('#datatable-FaqCategory_wrapper .col-md-6:eq(0)');


        //Date range picker
        $('#listing-dates').daterangepicker();

        //handler
        $('#listing-dates').on('apply.daterangepicker', function(ev, picker) {
            let startdate = picker.startDate.format('YYYY-MM-DD');
            let enddate = picker.endDate.format('YYYY-MM-DD');

            $("#startdate").val(startdate);
            $("#enddate").val(enddate);

            $("#date-range").submit();
        });
    });
</script>
@endsection