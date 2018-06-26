<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile as File;

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
        return $this->hasMany('App\Post', 'id_owner', 'id');
    }

    public static function findByLogin(string $login) {
        $user = static::where('login', $login)->get()[0];
        return $user;
    }

    public static function findByCredential(array $credential) {
        $user = static::where('login', $credential['login'])->first();
        if (is_null($user)) { // norm?
            return null;
        }

        $password = $user->password;

        if (Hash::check($credential['password'], $password)) {
            $user = static::find($user->id);
            return $user;
        }

        return null;
    }


    public function getPathToAvatar() {
        return Avatar::getPath($this->filename_avatar);
    }

    public function saveAvatar(File &$image) {
        $name = Avatar::save($image);
        $this->filename_avatar = $name;
        $this->save();
    }

    public function delete() {
        Avatar::delete($this->filename_avatar);
        parent::delete();
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
