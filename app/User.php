<?php

namespace App;

use Auth;
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
        'name', 'email', 'password', 'avatar', 'cover_photo', 'birthday', 'bio', 'interest', 'location', 'role',
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

    public function getInterests() {
        return $this->userRequests();
    }

    public function getFollowers() {
        return $this->theirRequests();
    }

    function posts() {
        return $this->hasMany('App\Post', 'user_id');
    }

    public function getPosts() {
        return $this->posts()->latest()->get();
    }

    public function getPhotos() {
        return $this->posts()->whereNotNull('picture')->latest()->get();
    }

    public function getLatestPhotos() {
        return $this->posts()->whereNotNull('picture')->limit(9)->latest()->get();
    }    

    function replies() {
        return $this->hasMany('App\Reply');
    }

    function addToInterests(User $user) {
        $this->userRequests()->attach($user->id);
    }

     function removeInterest($id) {
        $this->userRequests()->detach($id);
        $this->theirRequests()->detach($id);
    }
}
