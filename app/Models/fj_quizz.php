<?php

namespace App\Models;
Use \DB;
use Illuminate\Database\Eloquent\Model;

class fj_quizz extends Model
{
    protected $table ="fj_quizz";
    public $timestamps =true;
    protected $fillable =[
        '_token',
        'question_week',
        'question_account',
        'question_type',
        'question',
        'points',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'choice_5',
        'answer',
        'quizz_file_name',


    ];





}