<?php

namespace App\Http\Controllers\Admin;

use App\CallTracker;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallTrackerRequest;
use App\Http\Requests\UpdateCallTrackerRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class CallTrackerController extends Controller
{

    public function index()
    {
        $employee_code =  Auth::User()->employee_code;
        $entries = CallTracker::where('user_id',  $employee_code)->whereDate('created_at', Carbon::today())->get();

        return view('admin.callTracker.index', compact('entries'));
    }

    public function create()
    {
        return view('admin.callTracker.create');
    }

    public function store(StoreCallTrackerRequest $request)
    {
        $data = $request->all();
        $data['user_id'] =  Auth::User()->employee_code ?? null;
        $data['user_name'] =  Auth::User()->name ?? null;

        CallTracker::create($data);

        return redirect()->route('admin.calltracker.create');
    }

    public function edit(CallTracker $calltracker)
    {
        return view('admin.callTracker.edit', compact('calltracker'));
    }

    public function update(UpdateCallTrackerRequest $request, CallTracker $calltracker)
    {
        $calltracker->update($request->all());

        return redirect()->route('admin.calltracker.index');
    }

    public function destroy(CallTracker $calltracker)
    {
        $calltracker->delete();

        return back();
    }
}
