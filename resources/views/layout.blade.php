<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">


    <title>
        @yield('title')
    </title>
    @yield('meta')
</head>
<body>


<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/search">The Shitty App</a>
            </div>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="/search">Search</a></li>
                    <li><a href="/about">About</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/view') }}">Reviews</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
    </nav>
    @yield('header')
    @yield('content')
</div>






<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{URL::asset('/js/bootstrap.js')}}"></script>
</body>

    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAvjFUvwIwFkC27qepvkUNBXlbz7kkvTM"></script>--}}
    {{--<script src="{{URL::asset('/js/maps.js')}}"></script>--}}


</html>