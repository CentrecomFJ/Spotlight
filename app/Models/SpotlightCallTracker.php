<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotlightCallTracker extends Model
{
    use HasFactory;

    protected $table = "spotlight_call_tracker";
    public $timestamps = false;

    protected $fillable = [
        'call_date',
        'call_time',
        'customer_name',
        'email_address',
        'query_type',
        'status',
        'comments',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
