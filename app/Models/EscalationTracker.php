<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscalationTracker extends Model
{
    use HasFactory;

    protected $table = "escalation_tracker";
    public $timestamps = false;

    protected $fillable = [
        'esc_date',
        'order_no',
        'customer_name',
        'esc_type',
        'comments',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
