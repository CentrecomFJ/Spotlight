<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\careers;
use App\Models\fj_quizz;
use App\Models\fj_quizz_controller;
use App\Models\fj_quizz_results;
use App\Models\inbound_vacancy_applications;
use App\Models\leader_board;
use App\Models\staff_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizzController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function quizz_loader_view()
    {

        return view('fj_quizz.form.quizz-upload-drag-drop-view');
    }


    public function quizz_attempt_weeks(request $request)
    {
        // $employee_code = Auth::User()->employee_code ?? null;
        // $tmp_account = staff_list::where('employee_code', $employee_code)->first();
        // $question_account = $tmp_account->account ?? 'moh';
        // $question_account=$request['question_account'] ?? 'afj';

        $data = fj_quizz_controller::where('question_account', 'ams')->get();
        return view('fj_quizz.form.attempt-quizz-weeks-view')->with('data', $data);
    }

    public function quizz_release_answers(request $request)
    {

        $question_week = $request['question_week'];
        $question_account = $request['question_account'];
        $allowed = 1;
        $release_answer = 1;
        $allow_answers = fj_quizz_controller::where("question_week", $question_week)->where("question_account", $question_account)->first();
        $allow_answers->allowed = 1;
        $allow_answers->release_answer = 1;
        $allow_answers->save();


        return redirect()->route('fj-quizz-attempt-selector');
    }



    public function quizz_loader_submit(request $request)
    {

        $fileNameToStore = $request->file('file')->getClientOriginalName();
        //$document_alias=date('dmyhis').'_'.$request->file('file')->getClientOriginalName();
        $file_content = $request->file('file');

        $check = fj_quizz::where('quizz_file_name', $fileNameToStore)->first();


        if (isset($check)) {
            return view('fj_quizz.form.thank_you');
        }

        $handle_a = fopen($file_content, "r");
        $csvLine_a = fgetcsv($handle_a);
        $csvLine_b = fgetcsv($handle_a);



        $question_week = $csvLine_b[0] ?? null;
        $question_account = $csvLine_b[1] ?? null;


        $add_record = new fj_quizz_controller();
        $add_record->question_week = $question_week;
        $add_record->question_account = $question_account;
        $add_record->save();



        fclose($handle_a);

        $handle = fopen($file_content, "r");



        $header = true;
        //$row = 1;


        for ($i = 0; $csvLine = fgetcsv($handle); ++$i) {
            // Do something will $row array            
            if ($i > 0) {
                fj_quizz::create([
                    'question_week' => trim($csvLine[0]),
                    'question_account' => trim($csvLine[1]),
                    'question' => trim($csvLine[2]),
                    'question_type' => trim($csvLine[3]),
                    'points' => trim($csvLine[4]),
                    'choice_1' => trim($csvLine[5]),
                    'choice_2' => trim($csvLine[6]),
                    'choice_3' => trim($csvLine[7]),
                    'choice_4' => trim($csvLine[8]),
                    'choice_5' => trim($csvLine[9]),
                    'answer' => trim($csvLine[10]),
                    'quizz_file_name' => trim($fileNameToStore),
                ]);
            }
        }
        fclose($handle);
        //
        //        while ($csvLine = fgetcsv($handle, 1000, ",") !== FALSE ) {
        //            //$num = count($csvLine);
        //
        //
        //            if ($header) {
        //                $header = false;
        //            } else {
        //                fj_quizz::create([
        //                    'question_week' => $csvLine[0],
        //                    'question_account' => $csvLine[1],
        //                    'question' => $csvLine[2],
        //                    'points' => $csvLine[3],
        //                    'choice_1' => $csvLine[4],
        //                    'choice_2' => $csvLine[5],
        //                    'choice_3' => $csvLine[6],
        //                    'choice_4' => $csvLine[7],
        //                    'choice_5' => $csvLine[8],
        //                    'answer' => $csvLine[9],
        //                    'quizz_file_name' => $fileNameToStore,
        //
        //                ]);
        //            }
        //            $row++;
        //
        //        }
        //fclose($handle);


        return view('fj_quizz.form.thank_you');
    }

    public function admin_extract_answers(request $request)
    {
        $question_week = $request['question_week'] ?? null;

        if (!(is_null($question_week))) {
            $questions = DB::select(DB::raw("SELECT * FROM fj_quizz WHERE question_week = $question_week"));
            $agents = DB::select(DB::raw("SELECT distinct(employee_code) FROM fj_quizz_results WHERE fj_quizz_week = $question_week"));

            $csvFileName = $question_week . '-User_Answers.csv';

            $headdata = ['User'];
            foreach ($questions as $question) {
                array_push($headdata, $question->question);
            }

            $fp = fopen($csvFileName, 'w');
            fputcsv($fp, $headdata);

            foreach ($agents as $agent) {
                $jsonDecoded = [];
                $employee_code = $agent->employee_code;
                $answers = DB::select(DB::raw("SELECT concat(users.first_name,' ',users.last_name) AS fullname, fj_quizz_results.agent_answer FROM fj_quizz_results  LEFT JOIN users ON fj_quizz_results.employee_code=users.id where fj_quizz_results.fj_quizz_week=$question_week and fj_quizz_results.employee_code=$employee_code"));
                $jsonDecoded[] = $answers[0]->fullname;

                foreach ($answers as $ans) {
                    $jsonDecoded[] = $ans->agent_answer;
                }
                fputcsv($fp, (array)$jsonDecoded);
            }

            fclose($fp);
            $headers = array(
                'Content-Type' => 'text/csv',
            );
            return \Response::download($csvFileName, 'Week ' . $question_week . '-User_Answers.csv', $headers);
        }

        return view('fj_quizz.form.admin-extract-answers');
    }


    public function quizz_attempt(request $request)
    {

        $question_week = $request['question_week'] ?? 1;
        $question_account = $request['question_account'] ?? 'ams';

        $employee_code = Auth::User()->id ?? null;
        $is_present = leader_board::where('employee_code', $employee_code)
            ->where('question_week', $question_week)->where("question_account", $question_account)->get();
        // dd($is_present);
        if (count($is_present) > 0) {
            //return redirect()->route('fj-quizz-attempt-selector');
            return \Redirect::back()->withErrors(['You have already attempted this Quiz']);
        }


        $check_allowed = fj_quizz_controller::where('question_week', $question_week)->where('question_account', $question_account)->first();

        if ($check_allowed->allowed < 1) {
            return redirect()->route('fj-my-profile-view');
        }

        $data = fj_quizz::where('question_week', $question_week)->where("question_account", $question_account)->get();
        $user_id = Auth::User()->id ?? null;

        return view('fj_quizz.form.attempt-quizz-view')->with('data', $data)->with('user_id', $user_id);
    }


    public function quizz_attempt_answers(request $request)
    {
        $question_week = $request['question_week'] ?? 1;
        $question_account = $request['question_account'] ?? 'ams';

        $data = fj_quizz::where('question_week', $question_week)->where("question_account", $question_account)->get();
        $user_id = Auth::User()->id ?? null;
        return view('fj_quizz.form.attempt-quizz-view-answers')->with('data', $data)->with('user_id', $user_id);
    }




    public function quizz_attempt_submit(request $request)
    {
        $user_id = Auth::User()->id ?? null;
        $employee_code = Auth::User()->employee_code ?? null;
        $total_points_achieved = 0;
        $fj_quizz_week = $request['fj_quizz_week'];
        $total_points = fj_quizz::where('question_week', $fj_quizz_week)->sum('points');

        $leadboard = leader_board::where('question_week', $fj_quizz_week)->where('employee_code',  $user_id)->first() ?? null;

        if (!is_null($leadboard)) {
            return redirect()->route('fj-quizz-attempt-selector')->with('alert-warning', 'Records show that you have already attempted the test. Please note that you can only attempt the test once.');
        }

        foreach ($request->except('_token', 'answer', 'employee_code', 'fj_quizz_week', 'fj_quizz_account', 'quizz_timer') as $key => $part) {

            $q_answer = fj_quizz::select("answer", "points")->where('id', $key)->first();

            if ($part == $q_answer->answer) {

                $fk_quizz_point = $q_answer->points ?? 0;
            } else {

                $fk_quizz_point = 0;
            }

            $add = new fj_quizz_results();
            $add->employee_code = $request['employee_code'] ?? $employee_code;
            $add->fk_quizz_id = $key;
            $add->fk_quizz_point = $fk_quizz_point;
            $add->fj_quizz_week = $request['fj_quizz_week'];
            $add->fj_quizz_account = $request['fj_quizz_account'];
            $add->agent_answer = $part;
            $add->save();

            $total_points_achieved = $fk_quizz_point + $total_points_achieved;
        }

        if ($total_points == 0) {
            $percentage = 0;
        } else {
            $percentage = ($total_points_achieved / $total_points) * 100;
        }

        // $employee_code = Auth::User()->id ?? null;

        $update_attempt = leader_board::where('question_week', $request['fj_quizz_week'])
            ->where('status', 1)
            ->where('employee_code', $user_id)
            ->where('question_account', $request['fj_quizz_account'])->first();

        if (isset($update_attempt)) {
            $update_attempt->status = 2;
            $update_attempt->save();
        }


        // $getname = staff_list::where('employee_code', $employee_code)->first();
        // $name = $getname->first_name . '' . $getname->last_name;

        $name = Auth::User()->name ?? null;

        $add_leader_board = new leader_board();
        $add_leader_board->question_week = $request['fj_quizz_week'];
        $add_leader_board->total_points_achieved = $total_points_achieved;
        $add_leader_board->total_points = $total_points;
        $add_leader_board->name = $name;

        $add_leader_board->percentage = $percentage;
        $add_leader_board->employee_code = $user_id;
        $add_leader_board->question_account = $request['fj_quizz_account'];
        $add_leader_board->save();


        return view('fj_quizz.form.thank_you_completed');

        if ($percentage < 50) {
            return view('fj_quizz.form.thank_you_failed')
                ->with('total_points_achieved', $total_points_achieved)
                ->with('total_points', $total_points)
                ->with('percentage', $percentage);
        } else {


            return view('fj_quizz.form.thank_you_passed')
                ->with('total_points_achieved', $total_points_achieved)
                ->with('total_points', $total_points)
                ->with('percentage', $percentage);
        }
    }

    public function  user_quizz_summary_view()
    {

        return view('form.careers-view');
    }

    public function admin_quizz_summary_view()
    {

        return view('form.careers-view');
    }



    public function show_leader_answers(request $request)
    {


        $question_week = $request['question_week'] ?? 32;
        // $question_account=$request['question_account'] ?? 'afj';
        $reviews = \DB::select(\DB::raw("SELECT fj_quizz_results.employee_code ,users.id,users.first_name,fj_quizz_results.fk_quizz_id,fj_quizz_results.fk_quizz_point,fj_quizz_results.fj_quizz_week,fj_quizz_results.fj_quizz_account,fj_quizz_results.agent_answer FROM fj_quizz_results  LEFT JOIN users ON fj_quizz_results.employee_code=users.id where fj_quizz_week=$question_week"));



        $jsonDecoded = $reviews;

        $csvFileName = 'Answer_summary.csv';
        $headdata = ['id', 'id', 'name', 'question attempted', 'points achieved', 'Week', 'Account', 'Answer selected'];
        $fp = fopen($csvFileName, 'w');
        fputcsv($fp, $headdata);
        foreach ($jsonDecoded as $row) {
            fputcsv($fp, (array)$row);
        }

        fclose($fp);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return \Response::download($csvFileName, 'Answer_summary.csv', $headers);
    }

    public function show_leader_questions(request $request)
    {
        $question_week = $request['question_week'] ?? 32;
        // $question_account=$request['question_account'] ?? 'afj';
        $reviews = \DB::select("SELECT id,question_week,question_account,question,points,answer from fj_quizz where question_week=$question_week");



        $jsonDecoded = $reviews;

        $csvFileName = 'Quiz questions.csv';
        $headdata = ['Question id', 'Week', 'Account', 'Question', 'Points', 'Answer'];
        $fp = fopen($csvFileName, 'w');
        fputcsv($fp, $headdata);
        foreach ($jsonDecoded as $row) {
            fputcsv($fp, (array)$row);
        }

        fclose($fp);
        
        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return \Response::download($csvFileName, 'Quiz questions.csv', $headers);
    }

    public function show_leader_board(request $request)
    {
        
        $question_week = $request['question_week'] ?? null;
   
        if (!isset($question_week)) {
            $question_weeks = fj_quizz_controller::orderBy('id', 'desc')->first();
            $question_week[] = $question_weeks->question_week;
        }

        $ques_weeks = fj_quizz_controller::all()->pluck('question_week', 'id')->toArray();
        // $question_account=$request['question_account'] ?? 'afj';

        // $employee_code = Auth::User()->employee_code ?? null;
        // $tmp_account = staff_list::where('employee_code', $employee_code)->first();
        // $question_account = $tmp_account->account ?? 'moh';
        $question_account = 'ams';

        $data = leader_board::where('status', 1)
            ->whereIn('question_week', $question_week)
            ->where('question_account', $question_account)
            ->orderBy('total_points_achieved', 'desc')->get();
        
        return view('fj_quizz.form.leader-board')->with("data", $data)
                ->with("question_week", $question_week)
                ->with("ques_weeks", $ques_weeks);
    }
}
