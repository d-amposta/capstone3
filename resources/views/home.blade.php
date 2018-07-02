@extends('layout/master')

@section('content')
<div class="feed">
    <div class="row">
        <div class="col-xs-12 col-md-3 side_nav">
            @include('layout.timeline_nav')
        </div>

        <!-- posts -->
        <div class="col-xs-12 col-md-6 site_content">
            @include('layout.post_form')
            @foreach($posts as $post)
                @if(Auth::user()->getInterests->contains($post->user->id) || $post->user_id == Auth::user()->id) <!-- if a user likes someone -->
                    @include('layout.post_template')
                @endif
            @endforeach
            
        </div><!-- col -->
        
        <!-- suggested interests -->
        <div class="col-xs-12 col-md-3 ifWideScreen">
            @if(count($birthdays) > 0)
            <div class="quick_view_container today_container movable_div" data-count="{{count($birthdays)}}">
                <div class="quick_header">
                    <p>Birthdays</p>
                </div>
                <div class="quick_content">
                    <!-- <p>Birthdays</p> -->
                    <ul>
                        @foreach($birthdays as $birthday)
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="post_header_left">
                                    <a href='{{url("user/$birthday->id")}}'><img src='{{$birthday->avatar}}'></a>
                                </div>
                                <div class="post_header_content">
                                    <a href='{{url("user/$birthday->id")}}'>{{$birthday->name}}</a>
                                </div> 
                            </div>
                        </div>
                        @endforeach 
                    </ul>
                    <!-- <p>Events</p>
                    <ul>
                        <li>No events at this time</li>
                    </ul> -->
                </div>
            </div>
            @endif
            <div class="quick_view_container movable_div">
                <div class="quick_header">
                    <p>Suggested Interests</p>
                </div>
                <div class="quick_content">
                    <!-- if there are suggested interests display results -->
                    @if(count($suggested_interests) > 1)
                        @foreach($suggested_interests as $suggested_interest)
                            @if(Auth::user()->id != $suggested_interest->id && !$interests->contains($suggested_interest->id))
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="post_header_left">
                                            <a href='{{url("user/$suggested_interest->id")}}'><img src='{{$suggested_interest->avatar}}'></a>
                                        </div>
                                        <div class="post_header_content">
                                            <a href='{{url("$suggested_interest->id")}}'>{{$suggested_interest->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <a href="{{url(''.Auth::user()->id.'/suggested-interests')}}" class="content_link">View all</a>
                    <!-- if none display message -->
                    @else
                        <p>No suggested interests at this time</p>
                    @endif   
                </div>    
            </div>
        </div><!-- col --> 
    </div><!-- row -->    
</div>

@endsection
