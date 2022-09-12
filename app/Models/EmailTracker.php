<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTracker extends Model
{
    use HasFactory;

    protected $table = "email_tracker";
    public $timestamps = false;

    protected $fillable = [
        'date_received',
        'time_received',
        'email_address',
        'email_subject',
        'order_no',
        'email_category',
        'status',
        'escalation',
        'msg_via_slack',
        'issues_encountered',
        'comments',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
