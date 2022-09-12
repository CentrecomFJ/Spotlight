<?php

namespace App\Models;
Use \DB;
use Illuminate\Database\Eloquent\Model;

class staff_list extends Model
{
    protected $table ="staff_list";
    public $timestamps =true;
    protected $fillable =[
        '_token',
        'user_id',
        'website_identifier',
        'name',
        'position',
        'opening_date',
        'closing_date',
        'role_html',
        'email'


    ];





}