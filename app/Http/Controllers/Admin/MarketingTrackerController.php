<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMarketTrackerRequest;
use App\Http\Requests\UpdateMarketTrackerRequest;
use App\Models\MarketTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class MarketingTrackerController extends Controller
{
    public function index()
    {
        return view('admin.marketingtracker.index');
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
            $entries = MarketTracker::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        } else {
            $entries = MarketTracker::where('user_id',  $agent_id)
                ->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)
                ->get();
        }

        $entries->load('user');

        return  Datatables::of($entries)
            ->addColumn('action', function ($row) use ($user_roles) {

                $actions = '<a class="btn btn-xs btn-info mr-1" href="' . route('admin.marketingtracker.edit', ['marketingtracker' => $row->id]) . '" > Edit </a>';

                if (!empty(in_array('OOD_Admin', $user_roles))) {
                    $actions .= '<form action="' . route('admin.marketingtracker.destroy', ['marketingtracker' => $row->id]) . '" method="POST" onsubmit="return confirm(' . trans('global.areYouSure') . ');" style="display: inline-block;">
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
        return view('admin.marketingtracker.create');
    }

    public function store(StoreMarketTrackerRequest $request)
    {
         $data = $request->all();
         $data['user_id'] =  Auth::User()->id ?? null;
        $data['username'] =  Auth::User()->name ?? null;

        MarketTracker::create($data);
        return redirect()->route('admin.marketingtracker.create')->with(['message' => 'Entry saved successfully']);
     }

    public function edit(MarketTracker $marketingtracker)
    {
        // $covidtracker->load('agent', 'calltrackerQA');

        return view('admin.marketingtracker.edit', compact('marketingtracker'));
    }


    public function update(UpdateMarketTrackerRequest $request, MarketTracker $marketingtracker)
    {
        $marketingtracker->update($request->all());

        return redirect()->route('admin.marketingtracker.index')->with(['message' => 'Entry updated successfully']);
    }


    public function destroy(MarketTracker $marketingtracker)
    {
        $marketingtracker->delete();
        return back();
    }
}
