<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMOHCovidTrackerRequest;
use App\Http\Requests\UpdateMOHCovidTrackerRequest;
use App\MOHCovidTracker;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MOHCovidHelpdeskTrackerController extends Controller
{

    public function index()
    {
        $agent_id =  Auth::User()->id;
        $roles = Auth::User()->roles->toArray();
        $user_roles = array_column($roles, "title");

        if (!empty(in_array('MOH_Admin', $user_roles))) {
            $entries = MOHCovidTracker::whereDate('call_date', date('Y-m-d'))->get();
        } else {
            $entries = MOHCovidTracker::where('agent_id',  $agent_id)->whereDate('call_date', date('Y-m-d'))->get();
        }

        return view('admin.mohCovid.index', compact('entries'));
    }

    public function getdata(Request $request)
    {

        $agent_id =  Auth::User()->id;
        $roles = Auth::User()->roles->toArray();
        $user_roles = array_column($roles, "title");

        $data = $request->all();


        if (isset($data['start_date']) && isset($data['end_date'])) {
            $start_date = $data['start_date'];
            $end_date = $data['end_date'];
        } else {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
        }

        if (!empty(in_array('MOH_Admin', $user_roles))) {
            $entries = MOHCovidTracker::whereDate('call_date', '>=', $start_date)->whereDate('call_date', '<=', $end_date)->get();
        } else {
            $entries = MOHCovidTracker::where('agent_id',  $agent_id)
                ->whereDate('call_date', '>=', $start_date)->whereDate('call_date', '<=', $end_date)
                ->get();
        }

        return  Datatables::of($entries)
            ->addColumn('action', function ($row) use ($user_roles) {

                $actions = '<a class="btn btn-xs btn-info mr-1" href="' . route('admin.covidtracker.edit', ['covidtracker' => $row->id]) . '" > Edit </a>';

                if (!empty(in_array('MOH_Admin', $user_roles))) {
                    $actions .= '<form action="' . route('admin.covidtracker.destroy', ['covidtracker' => $row->id]) . '" method="POST" onsubmit="return confirm(' . trans('global.areYouSure') . ');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <input type="submit" class="btn btn-xs btn-danger" value="' . trans('global.delete') . '">
                                </form>';
                }

                return $actions;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $token = time() . '-' . Auth::user()->id;
        $refno = 'MOH-'.$token.'-'.strtoupper(bin2hex(random_bytes(1)));
        return view('admin.mohCovid.create', compact('refno'));
    }

    public function store(StoreMOHCovidTrackerRequest $request)
    {
        $data = $request->all();
        $data['agent'] =  Auth::User()->name ?? null;
        $data['agent_id'] =  Auth::User()->id ?? null;

        MOHCovidTracker::create($data);

        // return redirect()->route('admin.covidtracker.index')->with(['message' => 'Entry saved successfully']);
        return redirect()->route('admin.covidtracker.create')->with(['message' => 'Entry saved successfully']);
    }

    public function show(MOHCovidTracker $covidtracker)
    {
        // $covidtracker->load('agent', 'calltrackerQA');
        return view('admin.mohCovid.show', compact('covidtracker'));
    }

    public function edit(MOHCovidTracker $covidtracker)
    {
        // $covidtracker->load('agent', 'calltrackerQA');

        return view('admin.mohCovid.edit', compact('covidtracker'));
    }


    public function update(UpdateMOHCovidTrackerRequest $request, MOHCovidTracker $covidtracker)
    {
        // dd($request->all());
        $covidtracker->update($request->all());

        return redirect()->route('admin.covidtracker.index')->with(['message' => 'Entry updated successfully']);
    }


    public function destroy(MOHCovidTracker $covidtracker)
    {
        $covidtracker->delete();
        return back();
    }
}
