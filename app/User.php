<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Reply;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'bio', 'interest', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    function userRequests() {
        return $this->belongsToMany('App\User', 'friends', 'user_1', 'user_2');
    }

    function theirRequests() {
        return $this->belongsToMany('App\User', 'friends', 'user_2', 'user_1');
    }

    function userPosts() {
        return $this->hasMany('App\Post', 'user_id');
    }

    function userReplies() {
        return $this->hasMany('App\Reply');
    }

    function addFriend(User $user) {
        $this->userRequests()->attach($user->id);
    }


    function cancelRequest($id) {
        $this->userRequests()->detach($id);
    }

     function unFriend($id) {
        $this->userRequests()->detach($id);
        $this->theirRequests()->detach($id);
    }
}
