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

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

     <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
	<div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

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
                                <input type="text" name="search" placeholder="Search Interests" class="form-control">
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
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href='{{url("profile")}}'>{{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                     <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
	<footer></footer>

    @if(Auth::user())
    <input type="hidden" id="user" value="{{Auth::user()->id}}"></input>
    @endif

    <input type="hidden" id="token" value="{{csrf_token()}}"></input>
	
   
    <script type="text/javascript">
        function addReply(id) {
            var token = $('#token').val();
            var reply = $('#reply'+id).val();
            $.post(('add_reply/'+id), {
                _token : token,
                reply : reply,
            }, function(data) {
                $('#replies'+id).html(data);
                $('#reply'+id).val('');

            });
        }

        function editPost(id) {
            $("#edit_post"+id).click(function() {
                $('#editpost'+id).css('display', 'block');
                $('#post'+id).css('display', 'none');
                $('#edit_post'+id).css('display', 'none');
                $('#close_post'+id).css('display', 'inline');
            });

            $("#close_post"+id).click(function() {
                $('#editpost'+id).css('display', 'none');
                $('#post'+id).css('display', 'block');
               $('#edit_post'+id).css('display', 'inline');
                $('#close_post'+id).css('display', 'none');
            });
        }

        function editReply(id) {
            $("#edit_reply"+id).click(function() {
                $('#editreply'+id).css('display', 'block');
                $('#reply'+id).css('display', 'none');
                $('#edit_reply'+id).css('display', 'none');
                $('#close_reply'+id).css('display', 'inline');
            });

            $("#close_reply"+id).click(function() {
                $('#editreply'+id).css('display', 'none');
                $('#reply'+id).css('display', 'block');
               $('#edit_reply'+id).css('display', 'inline');
                $('#close_reply'+id).css('display', 'none');
            });
        }
    </script>
     
</body>
</html>