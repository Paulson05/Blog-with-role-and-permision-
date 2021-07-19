<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'posts';


    public  function tags(){
        return $this->belongsToMany(Tag::class,'posts_tags','posts_id','tags_id');
    }
    public  function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
