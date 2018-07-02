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

Route::get('/login', function() {
	return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('add-to-interests/{id}', function($id) {
	$user=User::find($id);
	Auth::user()->addToInterests($user);

	return back();
});

Route::post('remove-interest/{id}', function($id) {
	Auth::user()->removeInterest($id);

	return back();
});

Route::get('search', 'SearchController@displayResults');

Route::get('{id}', 'UserController@viewProfile')->name('user');

Route::get('/{id}/edit/profile', 'UserController@editUser');

Route::post('/{id}/edit/profile', 'UserController@saveEditUser');

Route::get('/{id}/account-settings', 'UserController@viewAccountSettings');

Route::get('/delete_profile', function() {
	$id=Auth::user()->id;
	$users=User::all();
	$interests=Auth::user()->userRequests;
	$followers=Auth::user()->theirRequests;
	/*$pending_requests=Auth::user()->pendingRequests();
	$friends=Auth::user()->friends();*/
	$posts=Post::latest()->get();

	return view('delete_profile', compact('id', 'users', 'interests', 'followers', 'posts'));
});

Route::post('/delete_profile', 'UserController@deleteUser');

Route::get('/delete_profile_confirm', function() {
	return view('/delete_profile_confirm');
});

Route::post('new_post', 'PostsController@createNewPost');

Route::get('edit/post/{id}', 'PostsController@viewEditPost');

Route::post('edit/post/{id}', 'PostsController@editPost');

Route::post('delete/post/{id}', 'PostsController@deletePost');

Route::post('add_reply/{id}', 'RepliesController@showReply');

Route::get('edit/reply/{id}', 'RepliesController@editReply');

Route::post('edit/reply/{id}', 'RepliesController@saveEditReply');

Route::post('delete/reply/{id}', 'RepliesController@deleteReply');

Route::get('/{id}/interests', 'UserController@viewInterests');

Route::get('/{id}/followers', 'UserController@viewFollowers');

Route::post('{id}/edit/avatar', 'UserController@updateAvatar');

Route::post('{id}/edit/cover-photo', 'UserController@updateCoverPhoto');

Route::get('post/{id}', 'PostsController@viewPost')->name('post');

Route::get('{id}/photos', 'PostsController@viewPhotos');

Route::get('{id}/events', 'UserController@viewEvents');

Route::get('{id}/suggested-interests', 'UserController@suggestedInterests');

Route::get('{id}/logout', '\App\Http\Controllers\Auth\LoginController@logout');