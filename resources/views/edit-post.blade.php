@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="post_container">
                <div class="post_header">
                    <div class="post_header_left">
                        <a href='{{url("user/$post->user_id")}}'><img src='/{{$post->user->avatar}}'></a>
                    </div>
                    <div class="post_header_content">
                        <a href='{{url("user/$post->user_id")}}'>{{$post->user->name}}</a>
                        <p class="timestamp">{{$post->created_at->diffForHumans()}}</p>    
                    </div>
                </div>
                <div class="post_content">
                    <form method="POST" action='{{url("edit/post/".$post->id."")}}'>
                        {{csrf_field()}}
                        <textarea name="post" class="form-control post-input" rows="1" placeholder="What's on your mind?">{{$post->post}}</textarea>
                    @if(!empty($post->picture))
                        <img src='/{{$post->picture}}'>
                    @endif
                    <input type="submit" class="btn" value="Save changes">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection