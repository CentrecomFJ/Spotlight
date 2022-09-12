<?php

namespace App\Http\Controllers\Admin;

use App\Accounts;
use App\Disciplinary;
use App\DisciplinaryAction;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDisciplinaryRequest;
use App\Http\Requests\StoreDisciplinaryRequest;
use App\Http\Requests\UpdateDisciplinaryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class DisciplinaryController extends Controller
{
    protected $disciplinary_types;

    public function __construct()
    {
        $this->disciplinary_types = array(
            "VERBAL_COUNSELLING" => "Verbal/Counselling",
            "1ST_WARNING" => "1st Warning",
            "2ND_WARNING" => "2nd Warning",
            "FINAL_WARNING" => "Final Warning",
            "TERMINATION" => "Termination",
        );
    }
    public function index()
    {
        abort_if(Gate::denies('disciplinary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disciplinaries = Disciplinary::all();

        return view('admin.disciplinary.index', compact('disciplinaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('disciplinary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Accounts::all()->sortBy('account_name')->pluck('account_name', 'id');
        $disciplinary_actions = DisciplinaryAction::all()->sortBy('action_name')->pluck('action_name', 'id');
        $employees = Employee::all()->sortBy('employee_code');

        $disciplinary_types = $this->disciplinary_types;

        return view('admin.disciplinary.create', compact('accounts', 'disciplinary_actions', 'disciplinary_types', 'employees'));
    }

    public function store(StoreDisciplinaryRequest $request)
    {
        $data = $request->all();
        dd($data);
        // implement steps to also save files into respective user folders 
        Disciplinary::create($data);
        return redirect()->route('admin.disciplinary.index');
    }

    public function edit(Disciplinary $disciplinary)
    {
        abort_if(Gate::denies('disciplinary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account = Accounts::all()->sortBy('account_name')->pluck('account_name', 'id');
        $disciplinaryAction = DisciplinaryAction::all()->sortBy('action_name')->pluck('action_name', 'id');
        $disciplinary->load('account', 'disciplinaryAction');

        $disciplinary_types = $this->disciplinary_types;

        return view('admin.disciplinary.edit', compact('account', 'disciplinaryAction', 'disciplinary', 'disciplinary_types'));
    }

    public function update(UpdateDisciplinaryRequest $request, Disciplinary $disciplinary)
    {
        $data = $request->all();
        $disciplinary->update($data);
        return redirect()->route('admin.disciplinary.index');
    }

    public function show(Disciplinary $disciplinary)
    {
        abort_if(Gate::denies('disciplinary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disciplinary->load('account', 'disciplinaryAction');

        return view('admin.disciplinary.show', compact('disciplinary'));
    }

    public function destroy(Disciplinary $disciplinary)
    {
        abort_if(Gate::denies('disciplinary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disciplinary->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisciplinaryRequest $request)
    {
        Disciplinary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
