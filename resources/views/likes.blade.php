@extends('layout/master')

@section('content')

<!-- name -->
<div class="row">
	<div class="col-sm-9 col-sm-offset-1 site_content">
		<div class="panel">
			<div class="panel-body">
				<div class="col-sm-4">
					<div class="avatar">
						<img id='avatar' class="profile-picture" src='/{{$user->avatar}}'>
					</div>
					<form method="POST" action='{{url("change_profile_picture")}}' enctype="multipart/form-data" class="change_profile_picture" style="display:none">
						{{csrf_field()}}
						<input type="file" name="avatar"></input>
						<input type="submit" name="submit" value="Submit"></input>
					</form>
				</div><!-- col -->
					
				<div class="col-sm-6 user_content">
					<p class="panel-section"><strong>{{$user->name}}</strong></p>
					
					@if(Auth::user()->id != $user->id && !$liked_by->contains(Auth::user()->id))
						<form method="POST" action='{{url("add_friend/$user->id")}}'>
							{{csrf_field()}}
							<button class="btn btn-success" id="add_friend">Like</button>
						</form>

					@elseif(Auth::user()->id == $user->id)
						
					@elseif(Auth::user()->id != $user->id && $liked_by->contains(Auth::user()->id))
						<form method="POST" action='{{url("cancelRequest/$user->id")}}'>
						{{csrf_field()}}
						<button class="btn btn-default">You like this person</button>
						</form>
					@else
						
					@endif
					<div>
						<p class="panel-section">Interests</p>
						<p>{{$user->interest}}</p>
					</div>
					<div>
						<p class="panel-section">Bio</p>
						<p>{{$user->bio}}</p>
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
                <a href='{{url("likes/$user->id")}}'><p class="center">Likes ({{count($user_likes)}})</p></a>
                <hr>
                <a href=""><p class="center">Messages</p></a>
                <hr>
                <a href='{{url("/edit_profile")}}'><p class="center">Edit Profile</p></a>
			</div><!-- panel-body -->
		</div><!-- panel -->
	</div><!-- col -->

	<div class="col-sm-7">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel">
					<div class="panel-body">
						<p>Likes ({{count($user_likes)}})</p>
						@foreach($user_likes as $user)
							<div class="col-sm-6">
								<div class="panel">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-3">
												
													<a href='{{url("view_user_profile/$user->id")}}'>
														<img src='/{{$user->avatar}}'>
													</a>
												
											</div>
										
											<div class="col-xs-7">
												<a href='{{url("view_user_profile/$user->id")}}'>
													<p ><strong>{{$user->name}}</strong></p>
												</a>
												
												@if(Auth::user()->id != $user->id && !$user_likes->contains($user->id))
												<form method="POST" action='{{url("add_friend/$user->id")}}'>
													{{csrf_field()}}
													<button class="btn btn-success" id="add_friend">Like</button>
												</form>
												@elseif(Auth::user()->id == $user->id)
													<a href='{{url("likes/$user->id")}}'><button class='btn btn-default'>Likes</button></a>
												@elseif(Auth::user()->id != $user->id && $user_likes->contains($user->id))
													<form method="POST" action='{{url("cancelRequest/$user->id")}}'>
													{{csrf_field()}}
													<button class="btn btn-default">You like this person</button>
													</form>
												@else
													<form method="POST" action='{{url("cancelRequest/$user->id")}}'>
													{{csrf_field()}}
														<button class="btn btn-default">Friend Request Sent</button>
													</form>
												@endif
											</div><!-- col -->
										</div> <!-- row -->
									</div><!-- panel-body -->
								</div><!-- panel -->
							</div><!-- col -->				
						@endforeach
					</div><!-- panel-body -->
				</div><!-- panel -->
			</div><!-- col -->
		</div><!-- row -->
		
		<div class="row">
			<div class="col-xs-12">
				<div class="panel">
					<div class="panel-body">
						<p>People who like you ({{count($liked_by)}})</p>
						@foreach($liked_by as $like)
							<div class="col-sm-6">
								<div class="panel">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-3">
												
													<a href='{{url("view_user_profile/$like->id")}}'>
														<img src='/{{$like->avatar}}'>
													</a>
												
											</div>
											<div class="col-xs-7">
												<a href='{{url("view_user_profile/$like->id")}}'>
													<p><strong>{{$like->name}}</strong></p>
												</a>
												@if(Auth::user()->id != $like->id && !$user_likes->contains($like->id))
													<form method="POST" action='{{url("add_friend/$like->id")}}'>
														{{csrf_field()}}
														<button class="btn btn-success" id="add_friend">Like</button>
													</form>
												@elseif(Auth::user()->id == $like->id)
													<a href='{{url("likes/$like->id")}}'><button class='btn btn-default'>Likes</button></a>
												@elseif(Auth::user()->id != $like->id && $user_likes->contains($like->id))
													<form method="POST" action='{{url("cancelRequest/$like->id")}}'>
													{{csrf_field()}}
													<button class="btn btn-default">You like this person</button>
													</form>
												@else
													<form method="POST" action='{{url("cancelRequest/$like->id")}}'>
													{{csrf_field()}}
														<button class="btn btn-default">Friend Request Sent</button>
													</form>	
												@endif
											</div><!-- col -->
										</div><!-- row -->
									</div><!-- panel-body -->
								</div><!-- panel -->
							</div><!-- col -->
						@endforeach
					</div><!-- panel-body -->
				</div><!-- panel -->	
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- col -->
</div><!-- row -->


@endsection