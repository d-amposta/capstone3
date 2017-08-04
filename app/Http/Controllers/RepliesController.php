<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Reply;

class RepliesController extends Controller
{
   /*function addReply(Request $request, $id) {
   	$new_reply= new Reply();
   	$new_reply->reply= $request->reply;
   	$new_reply->post_id = $id;
   	$new_reply->user_id = Auth::user()->id;
   	$new_reply->save();

   	return back();
   }*/

   public function showReply($id, Request $request) {
      $post = POST::find($id);

      $post->addReply(request('reply'));

      foreach($post->reply as $reply) {
                     
            echo '<div class="row">
                     <div class="col-xs-2 col-md-1">
                        <div class="small">
                           <a href="">
                              <img src='.$reply->user->avatar.'>
                           </a>
                        </div>
                     </div>
                     <div class="col-xs-10 col-md-10">
                        <a href='.url("view_user_profile/".$reply->user_id."").'>
                           <p class="panel-section-small"><strong class="reply">'.$reply->user->name.': </strong></p>
                        </a>
                        <p class="inline reply timestamp">'.$reply->created_at->diffForHumans().'</p>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-xs-11 col-xs-offset-2 col-md-offset-1">
                        <p class="reply">'.$reply->reply.'</p>
                           <form method="POST" id="editreply'.$reply->id.'"  class="edit_reply" action='.url("edit_reply/$reply->id").' style="display:none">
                              '.csrf_field().'
                              <input type="text" name="editreply" value='.$reply->reply.' class="reply"></input>
                              <input type="submit" value="Edit" class="btn btn-success btn-sm"></input>
                           </form>
                     </div>
                  </div>';
                  
                  if(Auth::user()->id == $reply->user_id) {
                     echo '<!-- edit-reply -->
                           <button id="edit_reply'.$reply->id.'" class="inline edit btn btn-link" onclick="editReply('.$reply->id.')">Edit</button>
                           <button id="close_reply'.$reply->id.'" class="inline edit btn btn-link" style="display:none">Close</button>';
                  }
                           

                        echo   '<form method="POST" class="delete_reply inline" action='.url("delete_reply/$reply->id").'>
                              '.csrf_field().'
                              <input type="submit" value="Delete" class="btn btn-link"></input>
                           </form>';
                  

              }


   }

   function editReply($id, Request $request) {
   	$reply_te = Reply::find($id);
   	$reply_te->reply = $request->editreply;
   	$reply_te->save();

   	return back();
   }

   function deleteReply($id) {
   	$reply_td = Reply::find($id);
   	$reply_td->delete();

   	return back();
   }
}
