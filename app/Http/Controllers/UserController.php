<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class UserController extends Controller
{
	function editUser() {
		$user=Auth::user();
		$users=User::all();
		$user_likes=Auth::user()->userRequests;
		$liked_by=Auth::user()->theirRequests;
		/*$pending_requests=Auth::user()->pendingRequests();
		$friends=Auth::user()->friends();*/
		$posts=Post::latest()->get();

		return view('edit_profile', compact('user', 'users', 'user_likes', 'liked_by', 'posts'));
	}

	function saveEditUser(Request $request) {
		$id=Auth::user()->id;
		$user_tbe=User::find($id);
		$user_tbe->name = $request->name;
		$user_tbe->email = $request->email;
		$user_tbe->bio = $request->bio;
		$user_tbe->interest = $request->interest;
		$user_tbe->save();

		return redirect('/profile');
	}

	function deleteUser() {
		
		$user_tbd=User::find($id);
		$user_tbd->delete();

		return redirect('/delete_profile_confirm');
	}

	function changeProfilePicture(Request $request) {
		$id=Auth::user()->id;
		$user_tbe=User::find($id);
		if(empty($request->avatar)) {

        }
        else {
            $image = $request->avatar;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/'.Auth::user()->id , $filename);
            $user_tbe->avatar = 'uploads/'.Auth::user()->id.'/'.$filename;
        }
		$user_tbe->save();

		return back();
	}
	
}
