<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleView extends Model
{
    use HasFactory;

    protected $table ="article_view";
    public $timestamps =true;

    protected $fillable =[
        'article_id',
        'user_id',
    ];
}
