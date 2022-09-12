<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TASErrorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

use App\Http\Requests\StoreTASErrorLogRequest;
use App\Http\Requests\UpdateTASErrorLogRequest;


class TASErrorLogController extends Controller
{
    public function index()
    {
        return view('admin.taserrorlog.index');
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
        
        /**OLD IMPLEMENTATION */
        // if (!empty(in_array('OOD_Admin', $user_roles))) {
        //     $entries = TASErrorLog::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        // } else {
        //     $entries = TASErrorLog::where('user_id',  $agent_id)
        //         ->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)
        //         ->get();
        // }
        
        if (!empty(in_array('OOD_Admin', $user_roles))) {
            $entries = TASErrorLog::whereDate('entry_date', '>=', $start_date)->whereDate('entry_date', '<=', $end_date)->get();
        } else {
            $entries = TASErrorLog::where('user_id',  $agent_id)
                ->whereDate('entry_date', '>=', $start_date)->whereDate('entry_date', '<=', $end_date)
                ->get();
        }

        $entries->load('user');
        
        return  Datatables::of($entries)
            ->addColumn('action', function ($row) use ($user_roles) {

                $actions = '<a class="btn btn-xs btn-info mr-1" href="' . route('admin.taserrorlog.edit', ['taserrorlog' => $row->id]) . '" > Edit </a>';

                if (!empty(in_array('OOD_Admin', $user_roles))) {
                    $actions .= '<form action="' . route('admin.taserrorlog.destroy', ['taserrorlog' => $row->id]) . '" method="POST" onsubmit="return confirm(' . trans('global.areYouSure') . ');" style="display: inline-block;">
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
        return view('admin.taserrorlog.create');
    }

    public function store(StoreTASErrorLogRequest $request)
    {
        $data = $request->all();
        $data['user_id'] =  Auth::User()->id ?? null;
        $data['username'] =  Auth::User()->name ?? null;

        TASErrorLog::create($data);
        return redirect()->route('admin.taserrorlog.create')->with(['message' => 'Entry saved successfully']);
    }

    public function edit(TASErrorLog $taserrorlog)
    {
        // $covidtracker->load('agent', 'calltrackerQA');
        return view('admin.taserrorlog.edit', compact('taserrorlog'));
    }


    public function update(UpdateTASErrorLogRequest $request, TASErrorLog $taserrorlog)
    {
        $taserrorlog->update($request->all());

        return redirect()->route('admin.taserrorlog.index')->with(['message' => 'Entry updated successfully']);
    }


    public function destroy(TASErrorLog $taserrorlog)
    {
        $taserrorlog->delete();
        return back();
    }

    public function show(TASErrorLog $taserrorlog)
    {
        $taserrorlog->delete();
        return back();
    }
}
