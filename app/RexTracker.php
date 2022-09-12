<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RexTracker extends Model
{
    use HasFactory;

    protected $table = "rex_tracker";
    public $timestamps = false;

    protected $fillable = [
        'request_type',
        'ref_no',
        'entry_date',
        'entry_time',
        'fname',
        'lname',
        'primary_phone',
        'secondary_phone',
        'email_address',
        'ta_booking',
        'booking_ref',
        'pass_fname',
        'pass_lname',
        'ticket_num',
        'whole_booking',
        'other_booking',       
        'flight_24hrs',
        'credit_req',
        'disposition',
        'comments',
        'location',
        'agent',
        'agent_id'
    ];
}
