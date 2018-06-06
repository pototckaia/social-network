<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'password', 'about', 'path_to_avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';
    protected static $name_table = 'users';

    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_owner', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'id_post', 'id');
    }

//    public function update() {
//
//    }

    public static function findByLogin(string $login) {
        return DB::table(static::$name_table)->where('login', $login);
    }

    public static function findByCredential(array $credential) {
        $user = DB::table(static::$name_table)->where('login', $credential['login']);
        if (is_null($user)) { // norm?
            return null;
        }

        $password = $user->pluck('password')[0];

        if (Hash::check($credential['password'], $password)) {
            return $user;
        }

        return null;
    }

    public function isAuthorized()
    {
        return session()->get('user')->id == $this->id;
    }

//    public function isOwnerPost($postId) {
//        $post = Post::find($postId);
//        return $this->id == $post->id_owner;
//    }
//
//    public function isOwnerComment($commentId) {
//        $comment = Comment::find($commentId);
//        return $this->id == $comment->id_owner;
//    }

}
