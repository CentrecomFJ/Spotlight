<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TASErrorLog extends Model
{
    use HasFactory;

    protected $table = "tas_error_log";
    public $timestamps = false;

    protected $fillable = [
        'entry_date',
        'agent_name',
        'booking_ref',
        'err_category',
        'err_definition',
        'comments',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
