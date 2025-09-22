<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//use HasFactory;
protected $table ='post';
protected $fillable = [
    'title',
    'body',
    'author',
    'published',
    ];

    protected $guarded = ['id'];

    public  function comments(){

        return $this ->hasMany(Comment::class);
    }


    public  function tags(){

        return $this ->belongsToMany(Tag::class);
    }
}
