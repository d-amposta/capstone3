@extends('layout/master')

@section('content')

<div class="row">
    <div class="col-sm-2">
        <div class="panel user-controller">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <img src='{{Auth::user()->avatar}}'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href='{{url("profile")}}' class="center"><p><strong>{{Auth::user()->name}}</strong></p></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <a href='{{url("profile")}}'><p class="center">Posts</p></a>
                        <hr>
                        <a href='{{url("likes/$user")}}'><p class="center">Likes ({{count($user_likes)}})</p></a>
                        <hr>
                        <a href=""><p class="center">Messages</p></a>
                        <hr>
                        <a href='{{url("/edit_profile")}}'><p class="center">Edit Profile</p></a>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col -->
    <div class="col-sm-7 site_content">
        <div class="row">
            <div class="col-xs-12">

                <!-- users -->
                <div class="panel">
                    <div class="panel-body">
                        @foreach($interests as $user)
                            @if(Auth::user()->id != $user->id)
                                <div class="col-sm-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                 <div class="col-xs-3">
                                                    <div class="small">
                                                        <img src='/{{$user->avatar}}'>
                                                    </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <a href='{{url("view_user_profile/$user->id")}}'><p><strong>{{$user->name}}</strong></p></a>
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
                                            </div><!-- row -->
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <p><strong>Interests</strong></p>
                                                    <p>{{$user->interest}}</p>
                                                </div><!-- col -->
                                            </div> <!-- row -->
                                        </div><!-- panel-body -->
                                    </div><!-- panel -->
                                </div><!-- col -->
                            @endif
                        @endforeach
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- col -->
</div><!-- row -->
@endsection