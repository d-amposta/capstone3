<div class="quick_view_container">
	<div class="quick_header">
		<p>Bio</p>
	</div>
	<div class="quick_content">
		<p>{{$user->bio}}</p>
		@if(!empty($user->location))
			<p class="location"><span class="location_icon"><i class="fas fa-map-marker-alt"></i></span>{{$user->location}}</p>
		@endif
	</div>
</div>
<div class="quick_view_container">
	<div class="quick_header">
		<p>Interested in</p>
	</div>
	<div class="quick_content">
		<p>{{$user->interest}}</p>
	</div>
</div>