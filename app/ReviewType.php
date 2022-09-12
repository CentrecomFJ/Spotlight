<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewType extends Model
{
    use HasFactory;
    
    protected $table ="review_type";
    public $timestamps = false;

    protected $fillable =[
        'review_name',
        'related'
    ];
}
