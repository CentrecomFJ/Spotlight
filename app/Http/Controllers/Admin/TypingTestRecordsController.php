<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypingTestRecords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class TypingTestRecordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function show_typing_test()
    {
        $sentences =  array();
        $sentences[0] = "page was first attracted to computers when he was six years old as he was able to play with the stuff lying around first generation personal computers that had been left by his parents he became the kid in his elementary school to turn in an assignment from a word processor his older brother also taught him to take things apart and before long he was taking everything in his house apart to see how it worked he said that from a very early age i also realized i wanted to invent things so i became really interested in technology and business";
        $sentences[8] = "in this section you describe where you grew up what impact your family and community had on you your first and best friends your education and early work experiences this is not a resume type of listing  but focuses on the aha moments of insights ouch pain points to solve and inspirational messages from mentors and influencers many of these have a conscious or sub conscious impact on your attitudes values and behaviours and this section of the canvas helps you understand how you became who you are today";
        $sentences[2] = "the bermuda triangle also known as the big triangle is a loosely defined region in the western part of the north atlantic ocean where a number of aircraft and ships are said to have disappeared and the name is not recognized by the US Board on geographic names  he would review period newspapers of the dates of reported incidents and find reports on possibly relevant events like unusual weather that were never mentioned in the disappearance stories";
        $sentences[3] = "social media has come a long way in China and its penetration is growing rapidly  while there were 86 million social network users in China in 2013 this number is expected to touch 197 million active shop at many Chinese stores at one place and we aim to house designer brands from China in the forthcoming months the products that will be available at Ownow are relatively exclusive and plenty of each is imported for the entire country";
        $sentences[4] = "in this section you describe where you grew up what impact your family and community had on you your first and best friends your education and early work experiences this is not a resume type of listing  but focuses on the aha moments of insights ouch pain points to solve and inspirational messages from mentors and influencers many of these have a conscious or sub conscious impact on your attitudes values and behaviours and this section of the canvas helps you understand how you became who you are today";
        $sentences[5] = "this is also about Chinese business and thinking processes he adds pointing to the frameworks and case studies of jbhifi and  innovation business writers in China will have the world reading them he believes that the only way to solve this is by helping women get online and sell home cooked food to consumers according to Jone most of the women are unable to go out for employment because of various reasons this makes them financially dependent on their parents children and husband";
        $sentences[6] = "the venture plans to take off with its consumer marketplace in phases with the app to be launched this october the company is also planning to go global with its partnerships and has commenced work with but there has been a major shift in their consumption patterns as well as attitudes the silver surfers dont see the need to hoard savings anymore as the next generation does not want or need to depend on their wealth this leaves them free to spend all that money on their own comforts";
        $sentences[7] = "it was after completing a two year stint at bongo systems that the desire to start a start up grew even stronger even while at bongo systems she made sure that she had a know how of different things so she got down gone are the days when three generations of a family lived under the same roof with the elderly passing on the reins of the household as well as their special needs to their children with migration nuclear families are becoming the norm and the elderly are mostly left to fend for themselves";
		$sentences[1] = "Hi Solene Thank you for your recent purchase with MAAP Im really sorry to let you know that when the warehouse went to pack the Womens Alt_Road Thermal Vest - Dark Teal Large on the order  that you ordered due to a stock error we are completely out of stock. Im really sorry this has happened to your order We have refunded this item back to you and the warehouse will go ahead and get the rest of your order on the way to you.  As soon as the order is scanned into the post-network you will get an email with the tracking information to let you know its on the way We are working on some solutions to minimize stock errors like this happening in the future sorry it hasnt helped for this order  Let me know if there is anything else at all that I can help you with and Im right here to assist you. Have a fantastic day";
        $sentence_arr = json_encode($sentences);
        
        return view('admin.typing_test_records.typing_test_records', array('sentence' => $sentence_arr));
    }

    public function show_typing_test_submit(request $request)
    {

        $user_id = $request['user_id'] ?? null;
        $user_name2 = $request['user_name2'] ?? null;
        $wpm = $request['wpm'] ?? null;
        $correct = $request['correct'] ?? null;
        $incorrect = $request['incorrect'] ?? null;
        $keystrokes = $request['keystrokes'] ?? null;
        $accuracy = $request['accuracy'] ?? null;

        $xa = new TypingTestRecords();
        $xa->user_id = $user_id;
        $xa->user_name2 = $user_name2;
        $xa->wpm = $wpm;
        $xa->correct = $correct;
        $xa->incorrect = $incorrect;
        $xa->keystrokes = $keystrokes;
        $xa->accuracy = $accuracy;
        $xa->save();

        return;
    }

    public function load_menus(request $request)
    {
        $menu = $request['menu'] ?? null;
        $count = 1;
        echo '<ul class="list-group" style="overflow-y:hidden ; height:720px ; width :100% ; overflow-y:auto;">';
        if ($menu == 1) {


            $rows = DB::select(DB::raw("select user_name2 , ROUND( avg(wpm),2) AS wpma ,  ROUND( avg(correct),2) AS correct , ROUND( avg(incorrect),2) AS incorrect , ROUND(avg(accuracy),2) AS accuracy , ROUND( avg(keystrokes),2) AS keystrokes from typing_test_records GROUP BY user_id ORDER BY wpma DESC,accuracy DESC,keystrokes DESC"));

            $rows = json_decode(json_encode($rows), true);

            foreach ($rows as $row) {
                echo '<li class="list-group-item" style="height:140px">
                <div><strong style="float:left"> ' . ucfirst($row['user_name2']) . ' is ranked ' . $count . ' </strong> <span style="float:right">WPM : ' . $row['wpma'] . ' </span> </div><br><br>
                <div style="float:left ;"><table class="table" style="font-size:15px;"><tr><td>Correct : ' . $row['correct'] . '</td><td>Incorrect : ' . $row['incorrect'] . '</span><td></tr>
                <tr><td>Accuracy : ' . $row['accuracy'] . '%</td><td>Keystrokes : ' . $row['keystrokes'] . '</td></tr></table></div>
                <div style="float:right"><span style="font-size:20px">';
                if ($count < 4) {
                    echo '<img  style="width:50px;" class="img-fluid" src="' . asset('img/trophy.png') . '"> ' . $count++ . ' </span></div></li>';
                } else {
                    echo '<img  style="width:50px;" class="img-fluid" src="' . asset('img/star_icon.jfif') . '"> ' . $count++ . ' </span></div></li>';
                }
            }
        } else if ($menu == 2) {
            $e_user_id = Auth::user()->id;
            $rows = TypingTestRecords::where('user_id', $e_user_id)->orderBy('created_at', 'desc')->get()->ToArray();
            foreach ($rows as $row) {
                echo '<li class="list-group-item" ><strong> ' . ucfirst($row['user_name2']) . ' </strong> <span style="float:right">WPM : ' . $row['wpm'] . ' </span><br><br> Correct : ' . $row['correct'] . ' <span style="float:right">Incorrect : ' . $row['incorrect'] . '</span> <br> Accuracy : ' . $row['accuracy'] . '% <span style="float:right">Keystrokes : ' . $row['keystrokes'] . ' </span>  <hr>';
                echo '<div style="float:left">';
                echo 'Attempt Date: ' . $row['created_at'];
                echo '</div>';
                echo '<div style="float:right">';

                if ($row['wpm'] < 35) {
                    echo '<span> <img  style="width:50px;" class="img-fluid" src="https://i.pinimg.com/236x/03/a9/5b/03a95b5e6c367f7f65f9b16d92eed622--musical-ly-funny-minion.jpg"> </span>';
                } else {

                    echo '<span> <img  style="width:50px;" class="img-fluid" src="' . asset('img/trophy.png') . '"> </span>';
                }

                echo '</div> <br> <br>  </li>';
            }
        } else if ($menu == 3) {
            $rows = TypingTestRecords::orderBy('created_at', 'desc')->get()->ToArray();
            foreach ($rows as $row) {
                echo '<li class="list-group-item"><strong> ' . ucfirst($row['user_name2']) . ' </strong> <span style="float:right">WPM : ' . $row['wpm'] . ' </span><br><br> Correct : ' . $row['correct'] . ' <span style="float:right">Incorrect : ' . $row['incorrect'] . '</span> <br> Accuracy : ' . $row['accuracy'] . '% <span style="float:right">Keystrokes : ' . $row['keystrokes'] . ' </span>';
                echo '<hr><div style="float:left">';
                echo 'Attempt Date: ' . $row['created_at'];
                echo '</div>';
                echo '<div style="float:right">';

                if ($row['wpm'] < 35) {
                    echo '<span> <img  style="width:50px;" class="img-fluid" src="https://i.pinimg.com/236x/03/a9/5b/03a95b5e6c367f7f65f9b16d92eed622--musical-ly-funny-minion.jpg"> </span>';
                } else {

                    echo '<span> <img  style="width:50px;" class="img-fluid" src="' . asset('img/trophy.png') . '"> </span>';
                }

                echo '</div> <br> <br>  </li>';
            }
        }

        echo '</ul>';
    }
}
