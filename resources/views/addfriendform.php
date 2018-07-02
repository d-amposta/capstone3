<!-- edit profile -->
<div class="row">

	<div class="col-sm-7">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel">
					<div class="panel-body">
						<p>Likes ({{count($user_interests)}})</p>
						@foreach($user_interests as $user)
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
												
												@if(Auth::user()->id != $user->id && !$user_interests->contains($user->id))
												<form method="POST" action='{{url("add_friend/$user->id")}}'>
													{{csrf_field()}}
													<button class="btn btn-success" id="add_friend">Like</button>
												</form>
												@elseif(Auth::user()->id == $user->id)
													<a href='{{url("likes/$user->id")}}'><button class='btn btn-default'>Likes</button></a>
												@elseif(Auth::user()->id != $user->id && $user_interests->contains($user->id))
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
												@if(Auth::user()->id != $like->id && !$user_interests->contains($like->id))
													<form method="POST" action='{{url("add_friend/$like->id")}}'>
														{{csrf_field()}}
														<button class="btn btn-success" id="add_friend">Like</button>
													</form>
												@elseif(Auth::user()->id == $like->id)
													<a href='{{url("likes/$like->id")}}'><button class='btn btn-default'>Likes</button></a>
												@elseif(Auth::user()->id != $like->id && $user_interests->contains($like->id))
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
