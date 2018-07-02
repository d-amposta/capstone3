<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="interest_container">
		<div class="interest_header">
			<div class="interest_avatar">
				<a href='{{url("$interest->id")}}'><img src="/{{$interest->avatar}}"></a>
			</div>
		</div>
		<div class="interest_content">
			<div class="interest_info">
				<a href='{{url("$interest->id")}}'>{{$interest->name}}</a>
				<p>{{$interest->bio}}</p>
			</div>
			<p>Interested in</p>
			<p>{{$interest->interest}}</p>
		</div>
		<div class="interest_options">
			@if(Auth::user()->id != $interest->id && Auth::user()->getInterests->contains($interest->id))
			<form method="POST" action="{{url('remove-interest/'.$interest->id.'')}}">
				{{csrf_field()}}
				<button type="submit"><i class="fas fa-times"></i></button>
			</form>
			@elseif(Auth::user()->id != $interest->id && !Auth::user()->getInterests->contains($interest->id))
			<form method="POST" action="{{url('add-to-interests/'.$interest->id.'')}}">
				{{csrf_field()}}
				<button type="submit"><i class="fas fa-plus"></i></button>
			</form>
			@elseif(Auth::user()->id == $interest->id)
			@endif
		</div>
	</div>
</div>