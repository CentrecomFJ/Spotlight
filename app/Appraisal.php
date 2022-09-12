<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    use HasFactory;

    protected $table = "appraisal";
    public $timestamps = false;

    protected $fillable = [
        'agent_id',
        'agent_name',
        'account_id',
        'review_type_id',
        'review_date',
        'status',
        'extended_reason',
        'extended_duration',
        'extended_status',
    ];

    public function account(){
        return $this->belongsTo(Accounts::class);
    }

    public function reviewType()
    {
        return $this->belongsTo(ReviewType::class);
    }
}
