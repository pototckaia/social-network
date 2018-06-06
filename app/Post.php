<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table_ = "posts";

    protected $fillable = [
        'title','content','comments_enable'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_owner', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_post', 'id');
    }
}
