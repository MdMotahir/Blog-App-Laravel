<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <title>Nettantra Blogs</title>
</head>

<body>
    <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">NetTantra Blogs</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-middle">
                @guest
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-user"></span>LogIn</a></li>
                    <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-log-in"></span> Sign Up</a></li>
                @else
                    <li><span class="glyphicon glyphicon-user"></span>{{Auth::user()->name}}</li>
                    @if (Auth::user()->role == 'admin')
                    <li><a href=""><span class="glyphicon glyphicon-log-in"></span> Admin Dashboard</a></li>
                    @endif
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
                        <form id="logout-form" action="{{route('logout')}}" method="POST">{{ csrf_field() }}</form>
                @endguest
            </ul>
        </div>
    </nav>
    @yield('content')  
</body>

</html>