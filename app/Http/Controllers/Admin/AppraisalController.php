<?php

namespace App\Http\Controllers\Admin;

use App\Accounts;
use App\Appraisal;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppraisalRequest;
use App\Http\Requests\StoreAppraisalRequest;
use App\Http\Requests\UpdateAppraisalRequest;
use App\ReviewType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppraisalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appraisal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appraisals = Appraisal::all();

        return view('admin.appraisal.index', compact('appraisals'));
    }

    public function create()
    {
        abort_if(Gate::denies('appraisal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Accounts::all()->sortBy('account_name')->pluck('account_name', 'id');
        $review_types = ReviewType::where('related', 'APPRAISAL')->get()->pluck('review_name', 'id');

        return view('admin.appraisal.create', compact('accounts', 'review_types'));
    }

    public function store(StoreAppraisalRequest $request)
    {
        $data = $request->all();
        $data['review_date'] =  $this->convertDateToDBFormat($data['review_date'], "Y-m-d");
        Appraisal::create($data);

        return redirect()->route('admin.appraisal.index');
    }

    private function convertDateToDBFormat($date, $format)
    {
        return date($format, strtotime($date));
    }

    public function edit(Appraisal $appraisal)
    {
        abort_if(Gate::denies('appraisal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account = Accounts::all()->sortBy('account_name')->pluck('account_name', 'id');
        $reviewType = ReviewType::where('related', 'APPRAISAL')->get()->pluck('review_name', 'id');
        $appraisal->load('account', 'reviewType');

        return view('admin.appraisal.edit', compact('account', 'reviewType', 'appraisal'));
    }

    public function update(UpdateAppraisalRequest $request, Appraisal $appraisal)
    {
        $data = $request->all();
        $data['review_date'] =  $this->convertDateToDBFormat($data['review_date'], "Y-m-d");

        $appraisal->update($data);

        return redirect()->route('admin.appraisal.index');
    }

    public function show(Appraisal $appraisal)
    {
        abort_if(Gate::denies('appraisal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appraisal->load('account', 'reviewType');

        return view('admin.appraisal.show', compact('appraisal'));
    }

    public function destroy(Appraisal $appraisal)
    {
        abort_if(Gate::denies('appraisal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appraisal->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppraisalRequest $request)
    {
        Appraisal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
