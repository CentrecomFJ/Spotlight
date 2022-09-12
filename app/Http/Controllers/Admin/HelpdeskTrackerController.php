<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHelpdeskTrackerRequest;
use Illuminate\Http\Request;
use App\HelpdeskTracker;
use App\Http\Requests\UpdateHelpdeskTrackerRequest;
use Illuminate\Support\Facades\Auth;

class HelpdeskTrackerController extends Controller
{

    public function index()
    {
        $agent_id =  Auth::User()->id;
        $roles = Auth::User()->roles->toArray();
        $user_roles = array_column($roles, "title");

        if (!empty(in_array('MOH_Admin', $user_roles))) {
            $entries = HelpdeskTracker::all();
        } else {
            $entries = HelpdeskTracker::where('agent_id',  $agent_id)->get();
        }

        return view('admin.helpdeskTracker.index', compact('entries'));
    }

    public function create()
    {

        $refno = 'MOH-' . strtoupper(bin2hex(random_bytes(3)));
        return view('admin.helpdeskTracker.create', compact('refno'));
    }

    public function store(StoreHelpdeskTrackerRequest $request)
    {
        $data = $request->all();
        $data['agent_id'] =  Auth::User()->id ?? null;

        HelpdeskTracker::create($data);

        return redirect()->route('admin.helpdesktracker.index')->with(['message'=>'Entry saved successfully']);
    }

    public function show(HelpdeskTracker $helpdesktracker)
    {
        $helpdesktracker->load('agent', 'calltrackerQA');
        return view('admin.helpdeskTracker.show', compact('helpdesktracker'));
    }

    public function edit(HelpdeskTracker $helpdesktracker)
    {
        $helpdesktracker->load('agent', 'calltrackerQA');

        return view('admin.helpdeskTracker.edit', compact('helpdesktracker'));
    }


    public function update(UpdateHelpdeskTrackerRequest $request, HelpdeskTracker $helpdesktracker)
    {
        $helpdesktracker->update($request->all());

        return redirect()->route('admin.helpdesktracker.index')->with(['message'=>'Entry updated successfully']);
    }


    public function destroy(HelpdeskTracker $helpdesktracker)
    {
        $helpdesktracker->delete();
        return back();
    }
}
