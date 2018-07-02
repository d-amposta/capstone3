@extends('layout/master')

@section('content')

	
<div class="row">
	<div class="col-xs-12 col-md-3">
		@include('layout.setting_nav')
	</div>
	<div class="col-xs-12 col-md-9">
		<div class="account-setting-container">
			<p>Change Password</p>
			<form method="POST" action="" class="form-horizontal">
				{{csrf_field()}}
				<div class="form-group">
					<label class="col-md-3 control-label">Old password</label>
					<div class="col-md-9">
						<input type="password" name="old-password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">New password</label>
					<div class="col-md-9">
						<input type="password" name="new-password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Confirm new password</label>
					<div class="col-md-9">
						<input type="password" name="new-password-retype" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="change-password" class="btn" value="Change password">
				</div>
			</form>
		</div>
		<div class="account-setting-container">
			<p><strong>Delete Account</strong></p>
			<p>Are you sure you want to delete your account?</p>
			<a href='{{url("delete_profile")}}'><button class="btn btn-danger">Delete Account</button></a>	
		</div>
		
	</div><!-- col -->
</div><!-- row -->
@endsection