<?php

namespace App\Http\Controllers\Admin;

use App\CallTracker;
use App\HelpdeskTracker;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQACallTrackerRequest;
use App\Http\Requests\UpdateQACallTrackerRequest;
use App\QACallTracker;
use Illuminate\Support\Facades\Auth;

class QACallTrackerController extends Controller
{
    public function store(StoreQACallTrackerRequest $request)
    {
        $data = $request->all();
        dd();
        $data['qa_code'] =  Auth::User()->employee_code ?? null;
        $data['qa_name'] =  Auth::User()->name ?? null;

        $qa_res = QACallTracker::create($data);
        $calltracker = HelpdeskTracker::find($data['helpdesktracker_id']);
        $calltracker->update(['qa_call_tracker_id' => $qa_res->id]);

        return back()->with('message', 'QA entry successful!');
    }

    public function update(UpdateQACallTrackerRequest $request, QACallTracker $qacalltracker)
    {
        $data = $request->except(['_token','_method','helpdesktracker_id']);

        $data['qa_code'] =  Auth::User()->employee_code ?? null;
        $data['qa_name'] =  Auth::User()->name ?? null;
        // dd($data);
        $qacalltracker->update($data);

        return back()->with('message', 'QA entry updated successfully!');
    }
}
