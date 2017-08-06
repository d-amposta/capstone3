<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->get();
        $user_likes=Auth::user()->userRequests;
        $liked_by=Auth::user()->theirRequests;
        $suggested_friends=User::where('interest', 'LIKE', '%'.Auth::user()->interest.'%')->get();
        $likes=Auth::user()->id;
        

        return view('home', compact('posts', 'user_likes', 'liked_by', 'suggested_friends', 'likes'));
    }
}
