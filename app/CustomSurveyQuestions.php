<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSurveyQuestions extends Model
{
    use HasFactory;

    protected $table = "customsurvey_questions";
    public $timestamps = false;
}
