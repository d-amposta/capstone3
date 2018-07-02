<div class="pqv_container">
    <div class="profile_quick_view">
        <div class="pqv_header">
            <div class="pqv_auth_cover">
                @if(!empty(Auth::user()->cover_photo))
                <img src="/{{Auth::user()->cover_photo}}">
                @endif
            </div>
            <div class="pqv_auth">
                <div class="pqv_auth_thumb">
                    <img src="/{{Auth::user()->avatar}}">    
                </div>
                <a href='{{url("".Auth::user()->id."")}}'>{{Auth::user()->name}}</a>
            </div>
            <div class="pqv_stats">
                <div>
                    <a href='{{url("".Auth::user()->id."/interests")}}'>Interests</a>
                    <p>{{count(Auth::user()->getInterests)}}</p>
                </div>
                <div>
                    <a href='{{url("".Auth::user()->id."/followers")}}'>Followers</a>
                    <p>{{count(Auth::user()->getFollowers)}}</p>
                </div>
            </div>
        </div>
        <div class="timeline_dropdown_menu">
            <div class="timeline_nav">
                <nav>
                    <ul>
                        <li><a href='{{url("".Auth::user()->id."")}}'>
                            <span class="timeline_nav_icon"><i class="far fa-clipboard"></i></span>
                            <span>Posts</span>
                        </a></li>
                        <li><a href="{{url(''.Auth::user()->id.'/photos')}}">
                            <span class="timeline_nav_icon"><i class="far fa-image"></i></span>
                            <span>Photos</span>
                        </a></li><li><a href='{{url("".Auth::user()->id."/suggested-interests")}}'>
                            <span class="timeline_nav_icon"><i class="fas fa-users"></i></span>
                            <span>Suggested Interests</span>
                        </a></li>
                        <p>Account</p>
                        <li><a href="{{url(''.Auth::user()->id.'/edit/profile')}}">
                            <span class="timeline_nav_icon"><i class="far fa-edit"></i></span>
                            <span>Edit Profile</span>
                        </a></li>
                        <li><a href='{{url("".Auth::user()->id."/account-settings")}}'>
                            <span class="timeline_nav_icon"><i class="fas fa-cog"></i></span>
                            <span>Account Settings</span>
                        </a></li>
                        <!-- FIX THISSS! -->
                        <li><a href="{{url(''.Auth::user()->id.'/logout')}}">
                            <span class="timeline_nav_icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span>Log Out</span>
                        </a></li>
                    </ul>
                </nav>
            </div>               
        </div>
    </div>
</div>