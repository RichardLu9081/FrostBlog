<?php

namespace App\Models;
//use Laravel\Scout\Searchable;

//use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   

    protected $table = "posts";
    
   // 替换成实际的表名

    protected $fillable = [
       
        'title',
        'content',
    ];
   
}