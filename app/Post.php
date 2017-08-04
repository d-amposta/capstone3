<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Reply;
use Auth;


class Post extends Model
{

    function user() {
    	return $this->belongsTo("App\User");
    }

    function reply() {
    	return $this->hasMany('App\Reply', 'post_id');
    }

    public function addReply($reply){
    	Reply::create([
    		'reply' => $reply,
    		'post_id' => $this->id,
    		'user_id' => Auth::user()->id,
    		]);
    }

}
