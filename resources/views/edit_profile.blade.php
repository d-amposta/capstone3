@extends('layout/master')

@section('content')
<div class="row">
    <div class="col-sm-2">
        <div class="panel user-controller">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <img id='avatar' class="profile-picture" src='{{Auth::user()->avatar}}'>
                        <form method="POST" action='{{url("change_profile_picture")}}' enctype="multipart/form-data" class="change_profile_picture" style="display:none">
						{{csrf_field()}}
						<input type="file" name="avatar"></input>
						<input type="submit" name="submit" value="Submit"></input>
					</form>
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
                        <a href='{{url("likes/")}}'><p class="center">Likes ({{count($user_likes)}})</p></a>
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
			<div class="col-xs-10 col-xs-offset-1 col-sm-12">
				<p>Edit Account</p>
				<form method="POST" action="">
				{{csrf_field()}}
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value='{{$user->name}}' class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" value='{{$user->email}}' class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Bio</label>
						<input type="text" name="bio" value='{{$user->bio}}' class="form-control" required></input>
					</div>
					<div class="form-group">
						<label>Interests</label>
						<input type="text" name="interest" value='{{$user->interest}}' class="form-control" required></input>
					</div>
					<input type="submit" name="edit_account" value="Edit" class="btn btn-success"></input>
				</form>
			</div><!-- col -->
		</div><!-- row -->
		<hr>


		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-12">
				<p><strong>Delete Account</strong></p>
				<a href='{{url("delete_profile")}}'><button class="btn btn-danger">Delete Account</button></a>
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- col -->
</div><!-- row -->
@endsection