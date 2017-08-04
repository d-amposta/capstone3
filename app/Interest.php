<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Interest extends Model
{
    function user() {
    	return $this->belongsToMany('App\User', 'users_interests', 'interest_id', 'user_id');
    }
}
