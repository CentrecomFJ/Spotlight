<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table ="tickets";
    public $timestamps = false;

    protected $fillable =[
        'user_id',
        'account_id',
        'ticket_category_id',
        'title',
        'priority',
        'message',
        'status',
    ];

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
