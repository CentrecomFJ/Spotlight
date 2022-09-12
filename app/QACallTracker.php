<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QACallTracker extends Model
{
    use HasFactory;
    protected $table = "qa_call_tracker";
    public $timestamps = false;

    protected $fillable = [
        'call_status',
        'qa_status',
        'qa_outcome',
        'qa_comments',
        'qa_code',
        'qa_name',
        'tracker',
    ];
}
