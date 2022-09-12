<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallTracker extends Model
{
    use HasFactory;

    protected $table ="call_tracker";
    public $timestamps = false;

    protected $fillable =[
        'call_stats_date',
        'user_id',
        'user_name',
        'time',
        'length_of_call',
        'parties',
        'direction',
        'skills',
        'category',
        'details',
        'call_type',
        'support_level',
        'status',
    ];
}
