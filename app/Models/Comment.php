<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'name',
        'email',
        'comments',
        'posts_id'
    ];
    public  function posts(){
        return $this->belongsTo('App\Models\Post','posts_id', 'id');
    }

}
