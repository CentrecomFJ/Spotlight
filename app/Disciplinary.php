<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinary extends Model
{
    use HasFactory;

    protected $table = "disciplinary";
    public $timestamps = false;

    protected $fillable = [
        'agent_id',
        'agent_name',
        'account_id',
        'disciplinary_action_id',
        'disciplinary_type',
        'comment',
        'sub_category',
        'issued_by',
    ];

    public function account()
    {
        return $this->belongsTo(Accounts::class);
    }

    public function disciplinaryAction()
    {
        return $this->belongsTo(DisciplinaryAction::class);
    }
}
