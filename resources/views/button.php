@if(Auth::user()->id != $user->id)
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                     <div class="col-xs-3">
                        <img src='/{{$user->avatar}}'>
                    </div>
                    <div class="col-xs-7">
                        <a href='{{url("view_user_profile/$user->id")}}'><p><strong>{{$user->name}}</strong></p></a>
                        @if(Auth::user()->id != $user->id && !$interests->contains($user->id))
                            <form method="POST" action='{{url("add_friend/$user->id")}}'>
                                {{csrf_field()}}
                                <button class="btn btn-success" id="add_friend">Like</button>
                            </form>
                        @elseif(Auth::user()->id == $user->id)
                            <a href='{{url("likes/$user->id")}}'><button class='btn btn-default'>Likes</button></a>
                        @elseif(Auth::user()->id != $user->id && $interests->contains($user->id))
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