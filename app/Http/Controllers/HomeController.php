<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Illuminate\Support\Carbon;

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
        $interests=Auth::user()->userRequests;
        $followers=Auth::user()->theirRequests;
        $suggested_interests=User::where('interest', 'LIKE', '%'.Auth::user()->interest.'%')->limit(10)->get();
        $likes=Auth::user()->id;
        $birthdays = Auth::user()->userRequests()->whereRaw('DATE_FORMAT(birthday, "%m-%d") = ?', [Carbon::now()->format('m-d')])->get();
        

        return view('home', compact('posts', 'interests', 'followers', 'suggested_interests', 'likes', 'birthdays'));
    }

    public function getPhotosFeed() {
        $interests = Auth::user()->getInterests;
        $user_ids = $interests->id;

        return view('photos', compact('interests', 'user_ids'));
    }
}
