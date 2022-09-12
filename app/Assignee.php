<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignee extends Model
{
    use HasFactory;

    protected $table ="assignee";
    public $timestamps = false;

    protected $fillable =[
        'name',
        'email',
        'telephone_num',
        'mobile_num',
    ];
}
