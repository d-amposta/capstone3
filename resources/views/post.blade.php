@extends('layout.master')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<div class="post_container">
			    <div class="post_header">
			        <div class="post_header_left">
			            <a href='{{url("$post->user_id")}}'><img src='/{{$post->user->avatar}}'></a>
			        </div>
			        <div class="post_header_content">
			            <a href='{{url("$post->user_id")}}'>{{$post->user->name}}</a>
			            <p class="timestamp">{{$post->created_at->diffForHumans()}}</p>    
			        </div>
			        <span class="glyphicon glyphicon-option-horizontal option_toggle"></span>
			        <div class="post_header_options" data-postId="{{$post->id}}">
			            @if($post->user_id == Auth::user()->id)
			            <a href='{{url("edit/post/".$post->id."")}}' class="btn-link"><span class="option_icon"><i class="fas fa-pencil-alt"></i></span>Edit this post</a>
			            <button class="btn-link" data-toggle="modal" data-target="#post{{$post->id}}"><span class="option_icon"><i class="fas fa-trash-alt"></i></span>Delete this post</button>
			            @else
			            <button class="btn-link"><span class="option_icon"><i class="fas fa-times"></i></span>Remove from Interests</button>
			            @endif
			        </div>
			    </div>
			    <div class="post_content">
			        <p>{{$post->post}}</p>
			        @if(!empty($post->picture))
			            <img src='/{{$post->picture}}'>
			        @endif
			    </div>
			    <div class="replies_container">
			    	<div class="reply_form">
			    		<form method="POST" action='{{url("add_reply/$post->id")}}'>
                            <div class="row">
                                {{csrf_field()}}
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    	<textarea id="reply{{$post->id}}" name="reply" class="form-control post-input" rows="1" placeholder="Write a reply..."></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-xs-offset-8 button">
                                    <input type="submit" id='replybutton{{$post->id}}' name="submit" value="Post" class="btn btn-sm"></input>
                                </div>
                            </div>
                        </form>
			    	</div>
			    	<div class="replies_container">
			    		<p>{{count($post->replies)}} Replies</p>
			    		@if($post->replies)
                            @foreach($post->replies as $reply)
                            <div class="modal fade" tabindex="-1" role="dialog" id="deleteReply{{$reply->id}}">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-body">
							        <p class="modal-inquiry">Do you want to delete this reply?</p>
							        <p>{{$reply->reply}}</p>
							        <form method="POST" action='{{url("delete/reply/".$reply->id."")}}'>
							            {{csrf_field()}}
							            <input type="submit" name='delete_post' value="Yes" class="modal-btn modal-btn-danger">
							            <button data-dismiss="modal" class="modal-btn">No</button>
							        </form>
							      </div>
							    </div>
							  </div>
							</div>
                            <div class="reply">
                            	<div class="reply_header">
                            		<div class="reply_avatar">
	                                    <img src="/{{$reply->user->avatar}}">
	                                </div>
	                                <div class="reply_content">
	                                	<a href='{{url("".$reply->user->id."")}}'>{{$reply->user->name}}</a>
	                                	<p class="timestamp">{{$reply->created_at->diffForHumans()}}</p>
	                                	<p>{{$reply->reply}}</p>
	                                </div>
                            	</div>
                            	@if($reply->user_id == Auth::user()->id)
                                <div class="reply_footer">
                                    <a href='{{url("edit/reply/".$reply->id."")}}'>Edit</a>
                                    <a href="#deleteReply{{$reply->id}}" data-toggle="modal">Delete</a>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        @endif
			    	</div>
			    </div>
			</div>
		</div>
	</div>
@endsection