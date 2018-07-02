@extends('layout/master')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-3 side_nav">
			@include('layout.timeline_nav')
		</div>
		<div class="col-xs-12 col-md-9">
            <div class="result_container">
                <div class="result_header">
                    <p>Suggested interests</p>
                </div>
                <div class="result_content">
                    <div class="row">
                        <!-- if there are suggested interests display results -->
                        @if(count($suggested_interests) > 0)
                            @foreach($suggested_interests as $interest)
                                @if(Auth::user()->id != $interest->id && !Auth::user()->getInterests->contains($interest->id))
                                    @include('layout.interest_template')
                                @endif
                            @endforeach
                        <!-- if none display message -->
                        @else
                            <p class="result-alert">No suggested interests at this time</p>
                        @endif  
                    </div>    
                </div>
            </div>
		</div>
	</div>
@endsection