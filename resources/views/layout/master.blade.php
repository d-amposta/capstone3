<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Interests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">  
	<!--  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

     <!-- jQuery library -->
</head>
<body>
    <div class="mobile-collapse">
        <nav>
            <ul>
                <li class="menu-brand">Interests</li>
                <li><a href='{{url("".Auth::user()->id."")}}'>
                    <span class="timeline_nav_icon"><i class="fas fa-user"></i></span>
                    <span>Profile</span>
                </a></li>
                <li><a href="{{url(''.Auth::user()->id.'/photos')}}">
                    <span class="timeline_nav_icon"><i class="far fa-image"></i></span>
                    <span>Photos</span>
                </a></li><li><a href='{{url("".Auth::user()->id."/suggested-interests")}}'>
                    <span class="timeline_nav_icon"><i class="fas fa-users"></i></span>
                    <span>Suggested Interests</span>
                </a></li>
                <li class="menu-text">Account</li>
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
	<div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('home') }}">
                        Interests
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::user())
                    <ul class="nav navbar-nav">
                        <form class="navbar-form navbar-left" method="get" action='{{url("search")}}'>
                            <div class="input-group">
                                <input type="text" name="search" placeholder="What are you interested in?" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </input>
                            </div>
                        </form>
                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href='{{url("/home")}}'><i class="fas fa-home" alt="Timeline"></i></a></li>
                        <li><a href="{{url(''.Auth::user()->id.'/photos')}}"><i class="far fa-image" alt=""></i></a></li>
                        <li><a href='{{url("".Auth::user()->id."/suggested-interests")}}'><i class="fas fa-users" alt="Suggested Interests"></i></a></li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href='{{url("".Auth::user()->id."")}}'>
                                    <div class="nav_avatar">
                                        <img src="/{{Auth::user()->avatar}}">
                                    </div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mobile-menu">
            <div class="mobile-nav">
                <ul>
                    <li><a href='{{url("/home")}}'><i class="fas fa-home" alt="Timeline"></i></a></li>
                    <li><a href="{{url(''.Auth::user()->id.'/photos')}}"><i class="far fa-image" alt=""></i></a></li>
                    <li><a href='{{url("".Auth::user()->id."/suggested-interests")}}'><i class="fas fa-users" alt="Suggested Interests"></i></a></li>
                    <li class="mobile-search-btn"><i class="fas fa-search"></i></li>
                    <li class="mobile-toggle"><i class="fas fa-bars"></i></li>
                </ul> 
            </div>
            <div class="mobile-search">
                <form method="GET" action="{{url('search')}}">
                    <input type="text" name="search" placeholder="What are you interested in?">
                    <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </form>
            </div>
        </div>
        <div class="master-container">
            @yield('content')    
        </div>
    </div>
    @if(Auth::user())
    <input type="hidden" id="user" value="{{Auth::user()->id}}"></input>
    @endif
    <input type="hidden" id="token" value="{{csrf_token()}}"></input>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</body>
</html>