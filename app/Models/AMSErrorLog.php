<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AMSErrorLog extends Model
{
    use HasFactory;

    protected $table = "ams_error_log";
    public $timestamps = false;

    protected $fillable = [
        'entry_date',
        'agent_name',
        'source',
        'type',
        'complaint_src',
        'impact_level',
        'comments',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
