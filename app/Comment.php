<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table_ = "comments";

    protected $fillable = [
        'title','content'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post', 'id_post', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_owner', 'id');
    }

    public function children()
    {
        return $this->hasMany('Comment', 'id_parent', 'id');
    }

    public function parent()
    {
        return $this->hasOne('Comment', 'id_parent', 'id');
    }

    public function allChildren() //  collection of recursively loaded children
    {
        return $this->children()->with('allChildren');
    }
}
