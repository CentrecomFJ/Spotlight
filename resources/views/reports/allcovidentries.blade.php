@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Helpdesk Entries</h1>
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
                {{-- report filters --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 style="text-decoration: underline;">Report Filters</h5>
                                <form id="date-range" action="{{ route('admin.report.allcovidentries') }}">
                                    @csrf
                                    <input type="hidden" name="startdate" id="startdate" value="{{ app('request')->input('startdate') ?? '' }}">
                                    <input type="hidden" name="enddate" id="enddate" value="{{ app('request')->input('enddate') ?? '' }}">

                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label class="col-6">Call Date range:</label>
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
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label class="col-6">Call Type:</label>
                                            <select class="form-control select2" name="call_type" data-width="100%" id="call_type">
                                                <option value="">Select call type</option>
                                                <option value="Health">Health</option>
                                                <option value="Abuse">Abuse</option>
                                                <option value="General">General</option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <label class="col-6">Query Type:</label>
                                            <select class="form-control select2" name="query_type" data-width="100%" id="query_type">
                                                <option value="" selected>Select Query Type</option>
                                                <option value='Business Operations'>Business Operations</option>
                                                <option value='Child Abuse'>Child Abuse</option>
                                                <option value='Complaint Health'>Complaint Health</option>
                                                <option value='Complaint Police'>Complaint Police</option>
                                                <option value='Contact Tracing'>Contact Tracing</option>
                                                <option value='COVID19 General Info'>COVID19 General Info</option>
                                                <option value='Curfew'>Curfew</option>
                                                <option value='Domestic Violence'>Domestic Violence</option>
                                                <option value='FNPF'>FNPF</option>
                                                <option value='Food Ration'>Food Ration</option>
                                                <option value='International Travel'>International Travel</option>
                                                <option value='Local Travel'>Local Travel</option>
                                                <option value='Lockdown Restrictions'>Lockdown Restrictions</option>
                                                <option value='MCTT Pass'>MCTT Pass</option>
                                                <option value='MoH Pass'>MoH Pass</option>
                                                <option value='Other Health'>Other Health</option>
                                                <option value='Screening Clinic'>Screening Clinic</option>
                                                <option value='Swab Test Request'>Swab Test Request</option>
                                                <option value='Swab Test Results'>Swab Test Results</option>
                                                <option value='Vaccination Registration'>Vaccination Registration</option>
                                                <option value='Vaccination Sites'>Vaccination Sites</option>
                                                <option value='Vaccination Visits '>Vaccination Visits </option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <label class="col-6">Location:</label>
                                            <select class="form-control select2" name="location" data-width="100%" id="location">
                                                <option value="">Select location</option>
                                                <option value='Ba'>Ba</option>
                                                <option value='Beqa'>Beqa</option>
                                                <option value='Deuba '>Deuba </option>
                                                <option value='Dreketi'>Dreketi</option>
                                                <option value='Gau'>Gau</option>
                                                <option value='Kadavu'>Kadavu</option>
                                                <option value='Koro Island'>Koro Island</option>
                                                <option value='Korolevu'>Korolevu</option>
                                                <option value='Korovou'>Korovou</option>
                                                <option value='Labasa'>Labasa</option>
                                                <option value='Lami'>Lami</option>
                                                <option value='Lau Group'>Lau Group</option>
                                                <option value='Lautoka'>Lautoka</option>
                                                <option value='Levuka'>Levuka</option>
                                                <option value='Lomawai'>Lomawai</option>
                                                <option value='Mamanuca'>Mamanuca</option>
                                                <option value='Nadi'>Nadi</option>
                                                <option value='Nasinu'>Nasinu</option>
                                                <option value='Natabua'>Natabua</option>
                                                <option value='Nausori'>Nausori</option>
                                                <option value='Navua'>Navua</option>
                                                <option value='Rabi'>Rabi</option>
                                                <option value='Rakiraki'>Rakiraki</option>
                                                <option value='Savusavu'>Savusavu</option>
                                                <option value='Seaqaqa'>Seaqaqa</option>
                                                <option value='Sigatoka'>Sigatoka</option>
                                                <option value='Suva'>Suva</option>
                                                <option value='Taveuni'>Taveuni</option>
                                                <option value='Tavua'>Tavua</option>
                                                <option value='Vatukoula'>Vatukoula</option>
                                                <option value='Yasawa'>Yasawa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 save">

                                        <div class="col-md-6 ">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                Apply
                                            </button>
                                            {{-- <input id="sales-tracker-submit" class="btn btn-primary pull-right" type="submit"  onclick="this.disabled=true; this.value='Saving, please wait...';this.form.submit();" value="Save" /> --}}
                                        </div>

                                        <div class="col-md-6">
                                            <button id="clear-filter-btn" class="btn btn-danger pull-left">
                                                Clear Filters
                                            </button>
                                            {{-- <input id="sales-tracker-submit" class="btn btn-primary pull-right" type="submit"  onclick="this.disabled=true; this.value='Saving, please wait...';this.form.submit();" value="Save" /> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- report --}}
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-FaqCategory" class="table table-bordered table-striped table-hover datatable datatable-FaqCategory">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Refnum
                                        </th>
                                        <th>
                                            Call Date
                                        </th>
                                        <th>
                                            Call Time
                                        </th>
                                        <th>
                                            Call Direction
                                        </th>
                                        <th>
                                            Call Type
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Fullname
                                        </th>
                                        <th>
                                            Gender
                                        </th>
                                        <th>
                                            Travelled
                                        </th>
                                        <th>
                                            Known Contact
                                        </th>
                                        <th>
                                            Symptoms
                                        </th>
                                        <th>
                                            Location
                                        </th>
                                        <th>
                                            Physical Address
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Query Details
                                        </th>
                                        <th>
                                            Division
                                        </th>
                                        <th>
                                            Query Type
                                        </th>
                                        <th>
                                            Agent
                                        </th>
                                        <th>
                                            Created At
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($covidEntries as $key => $entry)
                                    <tr data-entry-id="{{ $entry->id }}">
                                        <td>
                                            {{ $entry->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->ref_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_direction ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->call_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->fullname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->gender ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->travelled ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->known_contact ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->symptoms ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->location ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->physical_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->email_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->query_details ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->division ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->query_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->agent ?? '' }}
                                        </td>
                                        <td>
                                            {{ $entry->created_at ?? '' }}
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
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["excel"]
            , "order": [
                [16, "desc"]
            ]
        }).buttons().container().appendTo('#datatable-FaqCategory_wrapper .col-md-6:eq(0)');

        var startdate = "{{ app('request')->input('startdate') ?? date('Y-m-d') }}";
        var enddate = "{{ app('request')->input('enddate') ?? date('Y-m-d') }}";
        var call_type = "{{ app('request')->input('call_type') ?? "" }}";
        var query_type = "{{ app('request')->input('query_type') ?? "" }}";
        var location = "{{ app('request')->input('location') ?? "" }}";

      
        //Date range picker    
        $('#listing-dates').daterangepicker({
            startDate: startdate,
            endDate: enddate,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        //handler
        $('#listing-dates').on('apply.daterangepicker', function(ev, picker) {
            let startdate = picker.startDate.format('YYYY-MM-DD');
            let enddate = picker.endDate.format('YYYY-MM-DD');

            $("#startdate").val(startdate);
            $("#enddate").val(enddate);
        });

        setFilters();
        function setFilters() {
            if (call_type) {
                $("#call_type option[value='" + call_type + "']").prop('selected', true);
            }

            if (query_type) {
                $("#query_type option[value='" + query_type + "']").prop('selected', true);
            }

            if (location) {
                $("#location option[value='" + location + "']").prop('selected', true);
            }
        }
        
        $("#clear-filter-btn").on('click', function(e){
            e.preventDefault();

            clearFilter();
        });
        
        function clearFilter(){
            window.location = "{{ route('admin.report.allcovidentries') }}";
        }
    });

</script>
@endsection
