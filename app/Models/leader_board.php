<?php

namespace App\Models;
Use \DB;
use Illuminate\Database\Eloquent\Model;

class leader_board extends Model
{
    protected $table ="leader_board";
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