<?php

namespace App\Http\Controllers;

use App\Accounts;
use App\CustomSurvey;
use App\CustomSurveyQuestions;
use App\Helpers\ArticleService;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function index()
    {
        $custom_survey_questions = CustomSurveyQuestions::where('status','1')->get()->sortBy('rank');
        $custom_survey_entries = CustomSurvey::all()->toArray();

        return view('admin.customsurvey.report.surveyentries', compact('custom_survey_questions', 'custom_survey_entries'));
    }
}
