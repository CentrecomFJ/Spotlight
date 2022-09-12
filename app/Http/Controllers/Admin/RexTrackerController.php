<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRexTrackerRequest;
use App\Http\Requests\UpdateRexTrackerRequest;
use App\RexTracker;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RexTrackerController extends Controller
{
    public function index()
    {
        return view('admin.rextracker.index');
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
            $entries = RexTracker::whereDate('entry_date', '>=', $start_date)->whereDate('entry_date', '<=', $end_date)->get();
        } else {
            $entries = RexTracker::where('agent_id',  $agent_id)
                ->whereDate('entry_date', '>=', $start_date)->whereDate('entry_date', '<=', $end_date)
                ->get();
        }

        return  Datatables::of($entries)
            ->addColumn('fullname', function ($row) {
                $fullname = $row->fname. " " . $row->lname;
                return $fullname;
            })
            ->addColumn('action', function ($row) use ($user_roles) {

                $actions = '<a class="btn btn-xs btn-info mr-1" href="' . route('admin.rextracker.edit', ['rextracker' => $row->id]) . '" > Edit </a>';

                if (!empty(in_array('OOD_Admin', $user_roles))) {
                    $actions .= '<form action="' . route('admin.rextracker.destroy', ['rextracker' => $row->id]) . '" method="POST" onsubmit="return confirm(' . trans('global.areYouSure') . ');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <input type="submit" class="btn btn-xs btn-danger" value="' . trans('global.delete') . '">
                                </form>';
                }

                return $actions;
            })
            ->rawColumns(['fullname', 'action'])
            ->make(true);
    }

    public function create()
    {
        $token = time() . '-' . Auth::user()->id;
        $refno = 'REX-' . $token . '-' . strtoupper(bin2hex(random_bytes(1)));
        return view('admin.rextracker.create', compact('refno'));
    }

    public function store(StoreRexTrackerRequest $request)
    {
        $data = $request->all();
        $data['agent'] =  Auth::User()->name ?? null;
        $data['agent_id'] =  Auth::User()->id ?? null;

        RexTracker::create($data);
        // return redirect()->route('admin.covidtracker.index')->with(['message' => 'Entry saved successfully']);
        return redirect()->route('admin.rextracker.create')->with(['message' => 'Entry saved successfully']);
    }

    public function show(RexTracker $rextracker)
    {
        // $covidtracker->load('agent', 'calltrackerQA');
        return view('admin.mohCovid.show', compact('rextracker'));
    }

    public function edit(RexTracker $rextracker)
    {
        // $covidtracker->load('agent', 'calltrackerQA');

        return view('admin.rextracker.edit', compact('rextracker'));
    }


    public function update(UpdateRexTrackerRequest $request, RexTracker $rextracker)
    {
        $rextracker->update($request->all());

        return redirect()->route('admin.rextracker.index')->with(['message' => 'Entry updated successfully']);
    }


	public function destroy(RexTracker $rextracker)
    {
        $rextracker->delete();
        return back();
    }
}
