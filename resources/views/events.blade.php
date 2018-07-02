@extends('layout/master')

@section('content')
<div class="row">
	<div class="col-xs-12 col-md-3">
		@include('layout.timeline_nav')
	</div>
	<div class="col-xs-12 col-md-9">
		@if(count($birthdays) > 0)
            @foreach($birthdays as $birthday)
            <a href="{{url('user/'.$birthday->id.'')}}">{{$birthday->name}}</a>
            @endforeach
         @else
        <p>No one is celebrating their birthday today</p>
        @endif
	</div>
</div>
@endsection