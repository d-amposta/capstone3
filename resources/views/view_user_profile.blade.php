@extends('layout/master')

@section('content')
<div class="row">
	<div class="col-sm-9 col-sm-offset-1 site_content">
		<div class="panel">
			<div class="panel-body">
				<div class="col-sm-4">
					<div class="avatar">
						<img src='/{{$user->avatar}}'>
					</div>
				</div>
				<div class="col-sm-6">
					<p class="panel-section"><strong>{{$user->name}}</strong></p>
		
					@if(Auth::user()->id != $user->id && !$liked_by->contains(Auth::user()->id))
						<form method="POST" action='{{url("add_friend/$user->id")}}'>
							{{csrf_field()}}
							<button class="btn btn-success" id="add_friend">Like</button>
						</form>
					
					@elseif(Auth::user()->id == $user->id)
						<a href='{{url("likes/$user->id")}}'><button class='btn btn-default'>Likes</button></a>
					
					@elseif(Auth::user()->id != $user->id && $liked_by->contains(Auth::user()->id))
						<form method="POST" action='{{url("cancelRequest/$user->id")}}'>
						{{csrf_field()}}
						<button class="btn btn-default">You like this person</button>
						</form>
					
					@else
						
					@endif

					<div class="interest">
						<p class="panel-section">Interests</p>
						<p>{{$user->interest}}</p>
					</div>
					<div class="bio">
						<p class="panel-section">Bio</p>
						<p>{{$user->bio}}</p>
					</div>
				</div><!-- col -->
			</div><!-- panel-body -->
		</div><!-- panel -->
	</div><!-- col -->
</div><!-- row -->

<div class="row">
	<div class="col-sm-2 col-sm-offset-1">
		<div class="panel">
			<div class="panel-body">
				<a href='{{url("profile")}}'><p class="center">Posts</p></a>
                <hr>
                <a href='{{url("likes/$user->id")}}'><p class="center">Likes ({{count($user_likes)}})</p></a>
                <hr>
                <a href=""><p class="center">Messages</p></a>
                <hr>
                <a href='{{url("/edit_profile")}}'><p class="center">Edit Profile</p></a>
			</div><!-- panel-body -->
		</div><!-- panel -->
	</div><!-- col -->
	
	<!-- posts -->
	<div class="col-sm-7">
        @foreach($posts as $post)
	        @if($user->id == $post->user_id)
	            <div class="panel">
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-xs-2 col-md-1">
	                               <img src='/{{$post->user->avatar}}'>
	                        </div>
	                        <div class="col-xs-10 col-md-10">
	                            <a href='{{url("view_user_profile/$post->user_id")}}'><p class="panel-section-small"><strong>{{$post->user->name}}</strong></p></a>
	                            <p class="timestamp">{{$post->created_at->diffForHumans()}}</p>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-xs-12">
	                            <p>{{$post->post}}</p>
	                            @if(!empty($post->picture))
	                            <img src='/{{$post->picture}}'>
	                            @endif
	                        </div>
	                    </div> 
	                </div>
	                <div class="panel-footer">
	                    <div class="row">
	                        <div class="col-sm-11 col-sm-offset-1">
	                            <div class="row">
	                                <div class="col-xs-1">
	                                    <img src='/{{Auth::user()->avatar}}'>
	                                </div>
	                                <div class="col-xs-11">
	                                    <form method="POST" action='{{url("add_reply/$post->id")}}'>
                                        {{csrf_field()}}
	                                        <div class="col-xs-9 col-md-9">
	                                            <div class="form-group">
	                                                <input type="text" id='reply{{$post->id}}' name="reply" class="form-control"></input>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-2 col-md-2 button">
	                                            <input type="button" id='replybutton{{$post->id}}' name="submit" value="Post Reply" class="btn btn-success btn-sm" onclick="addReply({{$post->id}})"></input>
	                                        </div> 
                                    	</form>
	                                </div><!-- col -->
	                            </div><!-- row -->
		                        
	                            
		                        @if($post->reply)
		                           <div id="replies{{$post->id}}">
	                                    @foreach($post->reply as $reply)
	                                        <div class="row">
	                                            <div class="col-xs-2 col-md-1">
	                                                
	                                                    <a href=''>
	                                                        <img src='/{{$reply->user->avatar}}'>
	                                                    </a>
	                                                
	                                            </div>
	                                            <div class="col-xs-10 col-md-10">
	                                                <a href='{{url("view_user_profile/$reply->user_id")}}'>
	                                                    <p class="panel-section-small"><strong class="reply">{{$reply->user->name}}: </strong></p>
	                                                </a>
	                                                <p class="inline reply timestamp">{{$reply->created_at->diffForHumans()}}</p>
	                                            </div>
	                                        </div>
	                                        <!-- edit-reply -->
	                                        <div class="row">
	                                            <div class="col-xs-11 col-xs-offset-2 col-md-offset-1">
	                                                <p class="reply" id="reply{{$reply->id}}">{{$reply->reply}}</p>
	                                                <form method="POST" id="editreply{{$reply->id}}" class="edit_reply" action='{{url("edit_reply/$reply->id")}}' style="display: none">
	                                                {{csrf_field()}}
	                                                    <input type="text" name="editreply" value='{{$reply->reply}}' class="reply"></input>
	                                                    <input type="submit" value="Edit" class="btn btn-success btn-sm"></input>
	                                                </form>
	                                            </div>
	                                        </div>

	                                        @if($reply->user_id == Auth::user()->id)
	                                        <!-- button toggle for edit reply -->
	                                        <button id="edit_reply{{$reply->id}}" class="inline edit btn btn-link" onclick="editReply({{$reply->id}})">Edit</button>
	                                        <button id="close_reply{{$reply->id}}" class="inline edit btn btn-link" style="display:none">Close</button>
	                                        @endif

	                                        <!-- delete reply -->
	                                        <form method="POST" id='deletereply{{$reply->id}}' class="delete_reply" action='{{url("delete_reply/$reply->id")}}' onclick="deleteReply({{$reply->id}})">
	                                            {{csrf_field()}}
	                                            <input type="submit" value="Delete" class="btn btn-link"></input>
	                                        </form>
	                                    @endforeach
		                            </div><!-- div -->
		                        @endif
	                    	</div><!-- col -->
	                	</div><!-- row -->
	                </div><!-- panel-footer --> 
	            </div> <!-- panel -->
	        @endif
        @endforeach
    </div><!-- col -->
</div><!-- row -->
	
	
@endsection