@extends('layout/master')

@section('content')

@include("layout.profile_header")

<div class="row">
	@include('layout.interest_page_nav')
	<div class="col-xs-12 col-sm-9">
		<div class="row">
			<div class="col-xs-12">
				<div class="interests_header">
					@if($user->id == Auth::user()->id)
						<p>Your Followers</p>
					@else
						<p>{{$user->name}}'s Followers</p>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			@if(count($user->getFollowers) > 0)
			@foreach($user->getFollowers as $interest)
				@include('layout.interest_template')
			@endforeach
			@elseif(count($user->getFollowers) == 0)
				<div class="col-xs-12">
					<div class="interests_content">
						@if($user->id == Auth::user()->id)
							<p>No one has added you as their Interest yet</p>
						@else
							<p>No one has added {{$user->name}} as their Interest yet</p>
						@endif
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
@endsection