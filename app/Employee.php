<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";
    public $timestamps = false;

    protected $fillable = [
        'employee_code',
        'firstname',
        'lastname',
    ];
}
