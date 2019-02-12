<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table_ = "posts";

    protected $fillable = [
        'title','content','comments_enable', 'id_owner'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_owner', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_post', 'id');
    }

    public function is_owner(User $user) {
        return $user->id === $this->id_owner;
    }
}
