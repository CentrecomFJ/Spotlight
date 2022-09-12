<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaryAction extends Model
{
    use HasFactory;

    protected $table ="disciplinary_action";
    public $timestamps = false;

    protected $fillable =[
        'action_name',
    ];
}
