<?php

namespace App\Http\Controllers\Admin;

use App\Assignee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssigneeRequest;
use App\Http\Requests\UpdateAssigneeRequest;
use App\TicketCategory;
use Illuminate\Http\Request;

class AssigneeController extends Controller
{

    public function index()
    {
        $assignees = Assignee::all();

        return view('admin.assignee.index', compact('assignees'));
    }

    public function create()
    {
        $ticket_categories = TicketCategory::all()->pluck('name', 'id');
    //     $assignee = Assignee::all()->pluck('name', 'id');
        
        return view('admin.assignee.create', compact('ticket_categories'));
    }

    public function store(StoreAssigneeRequest $request)
    {
        $data = $request->all();
        Assignee::create($data);

        return redirect()->route('admin.assignee.index');
    }

    public function show(Assignee $assignee)
    {
        return view('admin.assignee.show', compact('assignee'));
    }

    public function edit(Assignee $assignee)
    {
        return view('admin.assignee.edit', compact('assignee'));
    }

    public function update(UpdateAssigneeRequest $request, Assignee $assignee)
    {
        $data = $request->all();
        $assignee->update($data);

        return redirect()->route('admin.assignee.index');
    }

    public function destroy(Assignee $assignee)
    {
        $assignee->delete();

        return back();
    }
}
