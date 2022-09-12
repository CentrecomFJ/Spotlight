@extends('layouts.adminlte')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>MAAP Email Entry List</h1>
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
                @can('call_entries_create')
                {{-- <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.covidtracker.create') }}">
                            Create Helpdesk Entry
                        </a>
                    </div>
                </div> --}}
                @endcan
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 offset-4">
                                <form>
                                    <input type="hidden" name="startdate" id="startdate">
                                    <input type="hidden" name="enddate" id="enddate">
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="listing-dates">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table id="datatable-CovidEntries" class="table table-bordered table-striped table-hover datatable datatable-CovidEntries">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Date Received
                                        </th>
                                        <th>
                                           Time Received
                                        </th>
                                        <th>
                                            Email Address
                                        </th>
                                        <th>
                                            Email Subject
                                        </th>
                                        <th>
                                            Order Number
                                        </th>
                                         <th>
                                            Email Category
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Escalation
                                        </th>
                                        <th>
                                            Message sent via Slack
                                        </th>
                                        <th>
                                            Issue Encountered
                                        </th>
                                        <th>
                                            Agent Remarks
                                        </th>
                                        <th>
                                            Agent Name
                                        </th>
                                        <th>
                                            Created At
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
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

        var dataTable = $('#datatable-CovidEntries').DataTable({
            processing: true
            , serverSide: true
            , autoWidth: false
            , pageLength: 15,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            // scrollX: true,
             //dom: 'Bfrtip'
             scrollY: "600px",
             dom: 'liBfrtp',
            "order": [
                [0, "desc"]
            ]
            , ajax: {
                url: "{{ route('admin.emailtracker.getdata') }}"
                , method: 'POST'
                , data: function(d) {
                    return $.extend({}, d, {
                        "_token": "{{ csrf_token() }}",
                        "start_date": $("#startdate").val() ?? null, 
                        "end_date": $("#enddate").val() ?? null
                    , });
                }
            , }
            , columns: [{
                    data: 'id'
                }
                , {
                    data: 'date_received'
                }
                ,{
                    data: 'time_received'
                }
                ,{
                    data: 'email_address'
                }
                , {
                    data: 'email_subject'
                }
                , {
                    data: 'order_no'
                }
                , {
                    data: 'email_category'
                }
                , {
                    data: 'status'
                }
                , {
                    data: 'escalation'
                }
                ,{
                    data: 'msg_via_slack'
                }
                , {
                    data: 'issues_encountered'
                }
                , {
                    data: 'comments'
                }
                , {
                    data: 'username'
                }
                , {
                    data: 'created_at'
                }
                , {
                    data: 'action'
                    , orderable: false
                    , searchable: false
                    // , sClass: 'text-center'
                }
            , ],
            "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'], 
                buttons: [
                    {extend: 'copy', text: 'Copy to clipboard'},
                    {
                        extend: 'excel', 
                        text: 'Export to Excel',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                ],
        });

        //Date range picker
        $('#listing-dates').daterangepicker();
        //handler
        $('#listing-dates').on('apply.daterangepicker', function(ev, picker) {
            let startdate = picker.startDate.format('YYYY-MM-DD');
            let enddate = picker.endDate.format('YYYY-MM-DD');

            $("#startdate").val(startdate);
            $("#enddate").val(enddate);
            dataTable.draw();
        });
    });

</script>
@endsection
