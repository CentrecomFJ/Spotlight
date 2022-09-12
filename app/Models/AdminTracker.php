<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTracker extends Model
{
    use HasFactory;

    protected $table = "admin_tracker";
    public $timestamps = false;

    protected $fillable = [
        'entry_date',
        'entry_time',
        'type',
        'customer_name',
        'email_address',
        'order_no',
        'amt_refunded',
        'stat',
        'quantity',
        'amount',
        'credit_memo_email',
        'comments',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
