<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOHCovidTracker extends Model
{
    use HasFactory;

    protected $table = "moh_covid_tracker";
    public $timestamps = false;

    protected $fillable = [
        'ref_no',
        'call_date',
        'call_time',
        'call_direction',
        'call_type',
        'phone',
        'fullname',
        'gender',
        'travelled',
        'known_contact',
        'symptoms',
        'location',
        'physical_address',
        'email_address',
        'query_details',
        'division',
        'query_type',
        'agent_id',
        'agent',
    ];
}
