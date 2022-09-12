<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallTracker extends Model
{
    use HasFactory;

    protected $table = "call_tracker";
    public $timestamps = false;

    protected $fillable = [
        'skill',
        'refno',
        'category',
        'firstname',
        'lastname',
        'streetnum',
        'streetname',
        'suburb',
        'town_city',
        'mobile',
        'alt_contact',
        'postal',
        'email',
        'dl_num',
        'clr_num',
        'sub_category',
        'enquiry_comments',
        'escalation_department',
        'escalation_person_name',
        'escalation_outcome',
        'escalation_call_disposition',
        'escalation_comments',
        'complaint_type',
        'complaint_ticket',
        'complaint_comments',
        'user_id',
        'user_name',
        'qa_call_tracker_id',
    ];

    public function calltrackerQA()
    {
        return $this->hasOne(QACallTracker::class, 'id', 'qa_call_tracker_id');
    }
}
