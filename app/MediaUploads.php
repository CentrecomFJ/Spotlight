<?php
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaUploads extends Model
{
    use HasFactory;

    protected $table ="media_uploads";
    public $timestamps =true;

    protected $fillable =[
        '_token',
        'user_id',
        'document_name',
        'type',
        'document_alias',
        'status'
    ];
}
