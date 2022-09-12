<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformanceArea extends Model
{
    use SoftDeletes;

    protected $table ="performance_area";
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable =[
        'performance_name',
    ];
}
