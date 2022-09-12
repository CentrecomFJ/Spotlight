<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskTracker extends Model
{
    use HasFactory;

    protected $table = "helpdesk_tracker";
    public $timestamps = false;

    protected $fillable = [
        'ref_no',
        'agent_id',
        'customer_name',
        'address',
        'call_disposition',
        'customer_enquiry',
        'escalation',
        'call_date',
        'call_time',
        'call_direction',
        'sub_category',
        'qa_call_tracker_id',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    public function calltrackerQA()
    {
        return $this->hasOne(QACallTracker::class, 'id', 'qa_call_tracker_id');
    }

}
