<div class="modal fade" tabindex="-1" role="dialog" id="post{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="modal-inquiry">Are you sure you want to delete this post?</p>
        <p class="modal-post">{{$post->post}}</p>
        @if(!empty($post->picture))
            <img src="/{{$post->picture}}">
        @endif
        <form method="POST" action='{{url("delete/post/".$post->id."")}}'>
            {{csrf_field()}}
            <input type="submit" name='delete_post' value="Yes" class="modal-btn modal-btn-danger">
            <button data-dismiss="modal" class="modal-btn">No</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="removeInterest{{$post->user_id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Do you want to remove {{$post->user->name}} from your interests?</p>
        <form method="POST" action='{{url("remove-interest/".$post->user->id."")}}'>
            {{csrf_field()}}
            <input type="submit" name='delete_post' value="Yes">
            <button data-dismiss="modal">No</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="post_container">
    <div class="post_header">
        <div class="post_header_left">
            <a href='{{url("$post->user_id")}}'><img src='/{{$post->user->avatar}}'></a>
        </div>
        <div class="post_header_content">
            <a href='{{url("$post->user_id")}}'>{{$post->user->name}}</a>
            <p class="timestamp">{{$post->created_at->diffForHumans()}}</p>    
        </div>
        <span class="glyphicon glyphicon-option-horizontal option_toggle"></span>
        <div class="post_header_options" data-postId="{{$post->id}}">
            @if($post->user_id == Auth::user()->id)
            <a href='{{url("edit/post/".$post->id."")}}' class="btn-link"><span class="option_icon"><i class="fas fa-pencil-alt"></i></span>Edit this post</a>
            <button class="btn-link" data-toggle="modal" data-target="#post{{$post->id}}"><span class="option_icon"><i class="fas fa-trash-alt"></i></span>Delete this post</button>
            @else
            <button class="btn-link" data-toggle="modal" data-target="#removeInterest{{$post->user_id}}"><span class="option_icon"><i class="fas fa-times"></i></span>Remove from Interests</button>
            @endif
        </div>
    </div>
    <div class="post_content">
        <p>{{$post->post}}</p>
        @if(!empty($post->picture))
            <img src='/{{$post->picture}}'>
        @endif
    </div>
    <div class="post_footer">
        <a href='{{url("post/$post->id")}}'><i class="far fa-comment"></i><span>{{count($post->replies)}}</span></a>
    </div>
</div>