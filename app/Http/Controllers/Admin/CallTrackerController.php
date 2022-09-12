<?php

namespace App\Http\Controllers\Admin;

use App\CallTracker;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallTrackerRequest;
use App\Http\Requests\UpdateCallTrackerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CallTrackerController extends Controller
{

    public function index()
    {
        $employee_code =  Auth::User()->employee_code;
        $roles = Auth::User()->roles->toArray();
        $user_roles = array_column($roles, "title");

        if (!empty(in_array('LMR_Admin', $user_roles))) {
            $entries = CallTracker::all();
        } else {
            $entries = CallTracker::where('user_id',  $employee_code)->get();
        }
        return view('admin.callTracker.index', compact('entries'));
    }

    public function create()
    {
        $refno = 'MLR-' . strtoupper(bin2hex(random_bytes(3)));
        return view('admin.callTracker.create', compact('refno'));
    }

    public function store(StoreCallTrackerRequest $request)
    {
        $data = $request->all();
        $data['user_id'] =  Auth::User()->employee_code ?? null;
        $data['user_name'] =  Auth::User()->name ?? null;


        CallTracker::create($data);

        return redirect()->route('admin.calltracker.create');
    }

    public function show(CallTracker $calltracker)
    {
        return view('admin.calltracker.show', compact('calltracker'));
    }

    public function edit(CallTracker $calltracker)
    {
        $calltracker->load('calltrackerQA');
        // dd($calltracker->calltrackerQA);
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
