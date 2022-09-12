<?php

namespace App\Http\Controllers\Admin;

use App\CustomSurvey;
use App\CustomSurveyQuestions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custom_survey_questions = CustomSurveyQuestions::where('status','1')->get()->sortBy('rank');
        $custom_survey_entries = CustomSurvey::all()->toArray();

        return view('admin.customsurvey.report.surveyentries', compact('custom_survey_questions', 'custom_survey_entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customsurvey.form.marketresearch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] =  Auth::user()->id;
        $data['contacted'] = $data['contacted'] ?? 'No';
        
        $survey = CustomSurvey::create($data);

        $message = 'Survey Entry ID: ' . $survey->id . ' created successfully.';
        return redirect()->route('admin.customsurvey.create')->with('message', $message);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    public function show_custom_survey_entries(){
        $custom_survey_questions = CustomSurveyQuestions::all()->sortBy('rank');
        $custom_survey_entries = CustomSurvey::all()->toArray();

        return view('admin.customsurvey.report.surveyentries', compact('custom_survey_questions', 'custom_survey_entries'));
    }
}
