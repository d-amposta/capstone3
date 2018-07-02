<div class="side_option_nav side_nav">
	<div class="side_option_header">
		<p>Profile Settings</p>
	</div>
	<nav>
		<ul>
			<li><a href='{{url("".Auth::user()->id."/edit/profile")}}'>Edit Profile</a></li>
			<li><a href='{{url("".Auth::user()->id."/account-settings")}}'>Account Settings</a></li>
		</ul>
	</nav>
</div>