<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Reply;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    function createNewPost(Request $request) {
    	$new_post= new Post();
    	$new_post->post = $request->post;
    	$new_post->user_id = Auth::user()->id;

        if(empty($request->img)) {

        }
        else {
            $image = $request->img;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/'.Auth::user()->id , $filename);
            $new_post->picture = 'uploads/'.Auth::user()->id.'/'.$filename;
        }
    	$new_post->save();

    	return back();
    }

    function viewPost($id) {
        $post = Post::find($id);

        return view('post', compact('post'));
    }

    public function viewPhotos($id) {
        $user = User::find($id);

        return view('photos', compact('user'));
    }

    function viewEditPost($id) {
        $post = Post::find($id);

        return view('edit-post', compact('post'));
    }

    function editPost($id, Request $request) {
    	$post_tbe=Post::find($id);
    	$post_tbe->post=$request->post;
    	$post_tbe->save();

    	return redirect()->route('post', [$post_tbe]);
    }

    function deletePost($id) {
    	$post=Post::find($id);
        $file=$post->picture;
    	$post->delete();
    	
        return back();
    }
}
