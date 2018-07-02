<div class="col-xs-12 col-md-3 side_nav">
	<div class="side_option_nav">
		<ul>
			<li>
				<a href='{{url("$user->id/interests")}}'>@if($user->id == Auth::user()->id)
					Your Interests
					@else
					{{$user->name}}'s Interests
					@endif
				</a>
			</li>
			<li><a href='{{url("$user->id/followers")}}'>Followers</a></li>
			@if($user->id == Auth::user()->id)
			<li><a href="">Suggested Interests</a></li>
			@endif
		</ul>	
	</div>
</div>