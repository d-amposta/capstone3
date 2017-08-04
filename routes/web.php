<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use App\Post;
use App\Reply;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth/register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', function() {

	$users=User::all();
	$user_likes=Auth::user()->userRequests;
	$liked_by=Auth::user()->theirRequests;
	/*$pending_requests=Auth::user()->pendingRequests();
	$friends=Auth::user()->friends();*/
	$posts=Post::latest()->get();
	$user=Auth::user()->id;
	
	return view('profile', compact('users', 'user_likes', 'liked_by', 'posts', 'user'));
});

Route::post('add_friend/{id}', function($id) {
	$user=User::find($id);
	Auth::user()->addFriend($user);

	return back();
});

Route::post('acceptRequest/{id}', function($id) {
	Auth::user()->acceptRequest($id);

	return redirect('/profile');
});

Route::post('declineRequest/{id}', function($id) {
	Auth::user()->declineRequest($id);

	return redirect('/profile');
});

Route::post('cancelRequest/{id}', function($id) {
	Auth::user()->cancelRequest($id);

	return back();
});

Route::post('delete_friend/{id}', function($id) {
	Auth::user()->unFriend($id);

	return back();
});

Route::get('search', function(Request $request) {
	
	$search = $request->search;
	$users= User::where('name', 'LIKE', '%'.$search.'%')->get();
	$interests=User::where('interest', 'LIKE', '%'.$search.'%')->get();
	$user_likes=Auth::user()->userRequests;
	$liked_by=Auth::user()->theirRequests;
	$user=Auth::user()->id;

	return view('search', compact('search', 'users', 'interests', 'user_likes', 'liked_by', 'user'));
});

Route::get('view_user_profile/{id}', function($id) {
	$user=User::find($id);
	$user_likes=$user->userRequests;
	$liked_by=$user->theirRequests;
	/*$friends=$user->friends();
	$pending_requests=Auth::user()->pendingRequests();*/
	$posts=Post::latest()->get();

	return view('view_user_profile', compact('user', 'user_likes', 'liked_by', 'posts'));
});

Route::get('/edit_profile', 'UserController@editUser');

Route::post('/edit_profile', 'UserController@saveEditUser');

Route::get('/delete_profile', function() {
	$id=Auth::user()->id;
	$users=User::all();
	$user_likes=Auth::user()->userRequests;
	$liked_by=Auth::user()->theirRequests;
	/*$pending_requests=Auth::user()->pendingRequests();
	$friends=Auth::user()->friends();*/
	$posts=Post::latest()->get();

	return view('delete_profile', compact('id', 'users', 'user_likes', 'liked_by', 'posts'));
});

Route::post('/delete_profile', 'UserController@deleteUser');

Route::get('/delete_profile_confirm', function() {
	return view('/delete_profile_confirm');
});

Route::post('new_post', 'PostsController@createNewPost');

Route::post('edit_post/{id}', 'PostsController@editPost');

Route::post('delete_post/{id}', 'PostsController@deletePost');

Route::post('add_reply/{id}', 'RepliesController@showReply');

Route::post('edit_reply/{id}', 'RepliesController@editReply');

Route::post('delete_reply/{id}', 'RepliesController@deleteReply');

Route::get('/likes/{id}', function($id) {

	$users=User::all();
	$user=User::find($id);
	$user_likes=$user->userRequests;
	$liked_by=$user->theirRequests;
	
	
	return view('likes', compact('users', 'user', 'user_likes', 'liked_by'));
});

Route::post('change_profile_picture', 'UserController@changeProfilePicture');