<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table ="accounts";
    public $timestamps = false;

    protected $fillable =[
        'account_name',
    ];
}
