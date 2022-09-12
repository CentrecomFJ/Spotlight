<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;

    protected $table ="ticket_categories";
    public $timestamps = false;

    protected $fillable =[
        'name'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
