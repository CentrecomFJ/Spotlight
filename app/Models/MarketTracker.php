<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketTracker extends Model
{
    use HasFactory;
    
    protected $table = "market_tracker";
    public $timestamps = false;

    protected $fillable = [
        'marketing_type',
        'brand',
        'sku',
        'old_price',
        'new_price',
        'agent_remarks',
        'user_id',
        'username',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
