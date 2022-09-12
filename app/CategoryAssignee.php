<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAssignee extends Model
{
    use HasFactory;

    protected $table = "category_assignee";
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'assignee_id',
        'is_active',
    ];

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function assignee()
    {
        return $this->belongsTo(Assignee::class);
    }
}
