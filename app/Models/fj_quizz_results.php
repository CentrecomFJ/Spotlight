<?php

namespace App\Models;
Use \DB;
use Illuminate\Database\Eloquent\Model;

class fj_quizz_results extends Model
{
    protected $table ="fj_quizz_results";
    public $timestamps =true;
    protected $fillable =[
        '_token',
         'employee_code',
        'fk_quizz_id',
        'fk_quizz_point',
        'fj_quizz_week',
        'fj_quizz_account',

    ];





}