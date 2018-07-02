@extends('layout/master')

@section('content')

@include("layout.profile_header")

<div class="row">
	@include('layout.interest_page_nav')
	<div class="col-xs-12 col-md-9">
		<div class="row">
			<div class="col-xs-12">
				<div class="interests_header">
					@if($user->id == Auth::user()->id)
					<p>Your Interests</p>
					@else
					<p>{{$user->name}}'s Interests</p>
					@endif	
				</div>
			</div>
		</div>
		<div class="row">
			@if(count($user->getInterests) > 0)
			@foreach($user->getInterests as $interest)
				@include('layout.interest_template')
			@endforeach
			@else
			<div class="col-xs-12">
				<div class="interests_content">
					@if($user->id == Auth::user()->id)
					<p>You haven't added anyone as your Interest yet</p>
					@else
					<p>{{($user->name)}} hasn't added anyone yet</p>
					@endif	
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection