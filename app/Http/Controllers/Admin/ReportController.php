<?php

namespace App\Http\Controllers\Admin;

use App\CallTracker;
use App\HelpdeskTracker;
use App\Http\Controllers\Controller;
use App\MOHCovidTracker;
use App\OodieTracker;
use App\RexTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{
    public function allEnquiries(Request $request)
    {
        $data = $request->all();
        $startdate = isset($data['startdate']) ? date($data['startdate']) : date('Y-m-d');
        $enddate =  isset($data['enddate']) ? date($data['enddate']) : date('Y-m-d');

        $enquiries = CallTracker::where('sub_category', 'Enquiry')->whereDate('created_at', ">=", $startdate)->whereDate('created_at', "<=", $enddate)->get();
        return view('reports.enquiries', compact('enquiries'));
    }

    public function allEscalations(Request $request)
    {
        $data = $request->all();
        $startdate = isset($data['startdate']) ? date($data['startdate']) : date('Y-m-d');
        $enddate =  isset($data['enddate']) ? date($data['enddate']) : date('Y-m-d');

        $escalations = CallTracker::where('sub_category', 'Escalations')->whereDate('created_at', ">=", $startdate)->whereDate('created_at', "<=", $enddate)->get();
        return view('reports.escalations', compact('escalations'));
    }

    public function allComplaints(Request $request)
    {
        $data = $request->all();
        $startdate = isset($data['startdate']) ? date($data['startdate']) : date('Y-m-d');
        $enddate =  isset($data['enddate']) ? date($data['enddate']) : date('Y-m-d');

        $complaints = CallTracker::where('sub_category', 'Complaints')->whereDate('created_at', ">=", $startdate)->whereDate('created_at', "<=", $enddate)->get();
        return view('reports.complaints', compact('complaints'));
    }

    public function allCallEntries(Request $request)
    {
        $data = $request->all();
        $startdate = isset($data['startdate']) ? date($data['startdate']) : date('Y-m-d');
        $enddate =  isset($data['enddate']) ? date($data['enddate']) : date('Y-m-d');

        $calltracker = HelpdeskTracker::whereDate('created_at', ">=", $startdate)->whereDate('created_at', "<=", $enddate)->get();

        return view('reports.alldetails', compact('calltracker'));
    }

    public function allQACallEntries()
    {
        $calltracker = HelpdeskTracker::has('calltrackerQA')->get();

        return view('reports.allQaCallEntries', compact('calltracker'));
    }

    public function allCovidEntries(Request $request)
    {
        $data = $request->all();
        $startdate = isset($data['startdate']) ? date($data['startdate']) : date('Y-m-d');
        $enddate =  isset($data['enddate']) ? date($data['enddate']) : date('Y-m-d');

        $call_type = $data['call_type'] ?? null;
        $query_type = $data['query_type'] ?? null;
        $location = $data['location'] ?? null;

        $query = MOHCovidTracker::whereDate('call_date', ">=", $startdate)->whereDate('call_date', "<=", $enddate);
        !is_null($call_type) ? $query->where('call_type', $call_type) : null;
        !is_null($query_type) ? $query->where('query_type', $query_type) : null;
        !is_null($location) ? $query->where('location', $location) : null;
        
        $covidEntries = $query->get();

        return view('reports.allcovidentries', compact('covidEntries'));
    }

    public function allOodieEntries(Request $request)
    {
        $data = $request->all();
        $startdate = isset($data['startdate']) ? date($data['startdate']) : date('Y-m-d');
        $enddate =  isset($data['enddate']) ? date($data['enddate']) : date('Y-m-d');

        $rextracker = RexTracker::whereDate('entry_date', ">=", $startdate)->whereDate('entry_date', "<=", $enddate)->get();

        return view('reports.allrexdetails', compact('rextracker'));
    }

}
