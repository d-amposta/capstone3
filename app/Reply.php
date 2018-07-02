<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;


class Reply extends Model
{
	protected $fillable = [
        'reply', 'post_id', 'user_id',
    ];
    
    function post() {
    	return $this->belongsTo("App\Post");
    }

    function user() {
    	return $this->belongsTo("App\User");
    }
}
