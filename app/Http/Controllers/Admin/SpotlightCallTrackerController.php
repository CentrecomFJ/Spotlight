<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpotlightCallTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

use App\Http\Requests\StoreSpotlightCallTrackerRequest;
use App\Http\Requests\UpdateSpotlightCallTrackerRequest;


class SpotlightCallTrackerController extends Controller
{
    public function index()
    {
        return view('admin.spotlightcalltracker.index');
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

        if (!empty(in_array('OOD_Admin', $user_roles))) {
            $entries = SpotlightCallTracker::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        } else {
            $entries = SpotlightCallTracker::where('user_id',  $agent_id)
                ->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)
                ->get();
        }

        $entries->load('user');
        
        return  Datatables::of($entries)
            ->addColumn('action', function ($row) use ($user_roles) {

                $actions = '<a class="btn btn-xs btn-info mr-1" href="' . route('admin.spotlightcalltracker.edit', ['spotlightcalltracker' => $row->id]) . '" > Edit </a>';

                if (!empty(in_array('OOD_Admin', $user_roles))) {
                    $actions .= '<form action="' . route('admin.spotlightcalltracker.destroy', ['spotlightcalltracker' => $row->id]) . '" method="POST" onsubmit="return confirm(' . trans('global.areYouSure') . ');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <input type="submit" class="btn btn-xs btn-danger" value="' . trans('global.delete') . '">
                                </form>';
                }

                return $actions;
            })
            ->rawColumns(['fullname','action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.spotlightcalltracker.create');
    }

    public function store(StoreSpotlightCallTrackerRequest $request)
    {
        $data = $request->all();
        $data['user_id'] =  Auth::User()->id ?? null;
        $data['username'] =  Auth::User()->name ?? null;

        SpotlightCallTracker::create($data);
        return redirect()->route('admin.spotlightcalltracker.create')->with(['message' => 'Entry saved successfully']);
    }

    public function edit(SpotlightCallTracker $spotlightcalltracker)
    {
        // $covidtracker->load('agent', 'calltrackerQA');
        return view('admin.spotlightcalltracker.edit', compact('spotlightcalltracker'));
    }


    public function update(UpdateSpotlightCallTrackerRequest $request, SpotlightCallTracker $spotlightcalltracker)
    {
        $spotlightcalltracker->update($request->all());

        return redirect()->route('admin.spotlightcalltracker.index')->with(['message' => 'Entry updated successfully']);
    }


    public function destroy(SpotlightCallTracker $spotlightcalltracker)
    {
        $spotlightcalltracker->delete();
        return back();
    }
}
