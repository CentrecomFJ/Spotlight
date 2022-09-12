<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M2MCurtain extends Model
{
    use HasFactory;

    protected $table = "m2m_curtain";

    public $timestamps = false;

    protected $fillable = [
        'division',
        'business_unit',
        'representative',
        'contact_name',
        'phone_num',
        'surburb',
        'description',
        'lead_date',
        'q1',
        'q2',
        'q3',
        'q4',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
