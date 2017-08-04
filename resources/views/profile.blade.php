@extends('layout/master')

@section('content')

<!-- name -->
<div class="row">
	<div class="col-sm-9 col-sm-offset-1 site_content">
		<div class="panel">
			<div class="panel-body">
				<div class="col-sm-4">
					<div class="avatar">
						<img id='avatar' class="profile-picture" src='{{Auth::user()->avatar}}'>
					</div>
					<form method="POST" action='{{url("change_profile_picture")}}' enctype="multipart/form-data" class="change_profile_picture" style="display:none">
						{{csrf_field()}}
						<input type="file" name="avatar"></input>
						<input type="submit" name="submit" value="Submit" class="btn btn-success"></input>
					</form>
				</div><!-- col -->
					
				<div class="col-sm-6 user_content">
					<p class="panel-section"><strong>{{Auth::user()->name}}</strong></p>
					<div>
						<p class="panel-section">Interests</p>
						<p>{{Auth::user()->interest}}</p>
					</div>
					<div>
						<p class="panel-section">Bio</p>
						<p>{{Auth::user()->bio}}</p>
					</div>	
				</div><!-- col -->
			</div><!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->
</div><!-- row -->

<!-- edit profile -->
<div class="row">
	<div class="col-sm-2 col-sm-offset-1">
		<div class="panel">
			<div class="panel-body">
				<a href='{{url("profile")}}'><p class="center">Posts</p></a>
                <hr>
                <a href='{{url("likes/$user")}}'><p class="center">Likes ({{count($user_likes)}})</p></a>
                <hr>
                <a href=""><p class="center">Messages</p></a>
                <hr>
                <a href='{{url("/edit_profile")}}'><p class="center">Edit Profile</p></a>
			</div><!-- panel-body -->
		</div><!-- panel -->
	</div><!-- col -->

	<div class="col-sm-7">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<form method="POST" action='{{url("new_post")}}' enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="col-xs-10 col-sm-10">
								<div class="form-group">
									<input type="text" id='post' name="post" placeholder="" class="form-control"></input>
								</div>
							</div>
							<div class="col-xs-2 col-sm-2 button">
								<div class="form-group">
									<input type="submit" id='addpost' name="addpost" value="Post" class="btn btn-success btn-sm" onclick="addPost()"></input>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<p id="add_photobutton">Add Photo</p>
									<input type="file" id='img' name="img" class="addphoto" style="display: none"></input>
								</div>
							</div>	
						</form>
					</div><!-- panel-body -->
				</div><!-- panel -->
			</div><!-- col -->
		</div><!-- row -->

		<div id="posts">
		@foreach($posts as $post)
		@if($post->user_id == $user)
			<div class="row">
				<div class="col-sm-12">
					<!-- Post Content -->
					<div class="panel">
						<div class="panel-body">	
							<div class="row" >
								<div class="col-xs-2 col-md-1">
									<div class="small">
										<img src='{{Auth::user()->avatar}}'>
									</div>
								</div>
								<div class="col-xs-10 col-md-11">
									<p class="panel-section-small"><strong>{{Auth::user()->name}}</strong></p>
									<p class="inline timestamp">{{$post->created_at->diffForHumans()}}</p>
								</div>
							</div>
							<div class="row" id='post{{$post->id}}'>
								<div class="col-xs-11 col-xs-offset-1" id="post">
									<p>{{$post->post}}</p>
									@if(!empty($post->picture))
									<img src='{{$post->picture}}'>
									@endif
								</div>
							</div>
							
							<!-- edit post -->
							<div class="row" >
								<div class="col-xs-11 col-xs-offset-1"  >
									<form method="POST" action='{{url("edit_post/$post->id")}}' id="editpost{{$post->id}}" class="edit_post">
									{{csrf_field()}}
										<input type="text" name="post" value='{{$post->post}}'></input>
										<input type="submit" name="edit_button{{$post->id}}" value="Edit Post" class="btn btn-success"></input> <!-- i put the submit button here so that it will be seen next to the text input -->
										@if(!empty($post->picture))
											<img src='{{$post->picture}}'>
											<p>Change Photo</p>
										@else
											<p>Add Photo</p>
										@endif
										<input type="file" name="img" class="addphoto"></input>
									</form>
								</div><!-- col -->
							</div><!-- row -->
						</div><!-- panel-body -->
						<div class="panel-footer">
							<!-- Button Toggles for edit post -->
							<button id="edit_post{{$post->id}}" onclick="editPost({{$post->id}})" class="inline edit btn btn-link">Edit</button>
							<button id="close_post{{$post->id}}" class="inline btn btn-link" style="display:none">Close</button>

							<!-- delete post -->
							<form method="POST" class="delete_post" action='{{url("delete_post/$post->id")}}'>
							{{csrf_field()}}
								<input type="submit" name="deletepost" value="Delete" class="btn btn-link"></input>
							</form>

							<!-- Add Reply form -->	
							<div class="row">
								<div class="col-sm-11 col-sm-offset-1">
									<div class="row">
										<div class="col-xs-1">
											<img src='/{{Auth::user()->avatar}}'>
										</div>
										<div class="col-xs-11">
											<form method="POST" action='{{url("add_reply/$post->id")}}'>
												{{csrf_field()}}
												<div class="col-xs-9">
													<div class="form-group">
														<input type="text" id='reply{{$post->id}}' name="reply" class="form-control"></input>	
													</div>
												</div>
												<div class="col-xs-2 button">
													<input type="button" id='replybutton{{$post->id}}' name="submit" value="Post Reply" class="btn btn-success btn-sm" onclick="addReply({{$post->id}})"></input>
												</div>
											</form>
										</div>
										
									</div>

						
							<!-- Reply content -->
							@if($post->reply)
								<div id="replies{{$post->id}}">
									@foreach($post->reply as $reply)
										<div class="row">
											<div class="col-xs-2 col-md-1">
												<div class="small">
													<a href=''>
														<img src='{{$reply->user->avatar}}'>
													</a>
												</div>
											</div>
											<div class="col-xs-10 col-md-10">
												<a href='{{url("view_user_profile/$reply->user_id")}}'sm>
													<p class="panel-section-small"><strong class="reply">{{$reply->user->name}}: </strong></p>
												</a>
												<p class="inline timestamp">{{$reply->created_at->diffForHumans()}}</p>
											</div>
										</div>
										<!-- edit-reply -->
										<div class="row">
											<div class="col-xs-11 col-xs-offset-1">
												<p class="reply" id="reply{{$reply->id}}">{{$reply->reply}}</p>
												<form method="POST" id="editreply{{$reply->id}}" class="edit_reply" action='{{url("edit_reply/$reply->id")}}' style="display: none">
												{{csrf_field()}}
													<input type="text" name="editreply" value='{{$reply->reply}}' class="reply"></input>
													<input type="submit" value="Edit" class="btn btn-success"></input>
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
						</div><!-- panel-footer -->
					</div> <!-- panel -->
				</div> <!-- col -->
			</div> <!-- row -->
		@endif
		@endforeach
		</div> <!-- posts -->
	</div> <!-- col -->	
</div> <!-- row -->


@endsection