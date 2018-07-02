<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function displayResults(Request $request) {
    	$auth = Auth::user();
    	$search = $request->search;
		$users= User::where('name', 'LIKE', '%'.$search.'%')->get();
		$interests_query=User::where('interest', 'LIKE', '%'.$search.'%')->get();
		$interests=Auth::user()->userRequests;
		$followers=Auth::user()->theirRequests;
		$user=Auth::user()->id;

		return view('search', compact('auth', 'search', 'users', 'interests_query', 'interests', 'followers', 'user'));
    }
}
