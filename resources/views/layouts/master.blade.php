<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Sosial Media</title>
    <link rel="icon" href="{{asset('social-network-social-media-pngrepo-com.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!--<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">-->
    <style>
    </style>
</head>

<body>
    @csrf
    <header>
        <div class="container">
            <a href="{{ url('index') }}"><img width="50"
                    src="https://www.pngrepo.com/download/278803/social-network-social-media.png" class="logo"
                    alt="Sosmed"></a>
            @auth
            <div align="right"> Welcome back, {{Auth::user()->name}}. </div>
            <div align="right">
            <a class="btn btn-info" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Logout <!--{{ __('Logout') }}-->
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            </div>
            @else
            <form class="form-inline"> 
            @csrf              
            
                <div class="form-group">
                    <a href="register" class="btn btn-primary">Sign up</a><br>
                </div>  
                <div class="form-group">
                    <a href="login" class="btn btn-info">Log in</a><br>
                </div>
            </form>
            @endauth
        </div>
        
    </header>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('index') }}">Home</a></li>
                    <li><a href="{{ url('member') }}">Members</a></li>
                    <!--<li><a href="{{ url('group') }}">Groups</a></li>-->
                    <li><a href="{{ url('photo') }}">Photos</a></li>
                    <li><a href="{{ url('profile') }}">Profile</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default friends">
                        <div class="panel-heading">
                            <h3 class="panel-title">Following</h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                                <li><a href="{{ url('profile') }}" class="thumbnail"><img src="{{asset('img/user.png')}}" alt=""></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <a class="btn btn-primary" href="#">View All Friends</a>
                        </div>
                    </div>
                    <!--<div class="panel panel-default groups">
                        <div class="panel-heading">
                            <h3 class="panel-title">Latest Groups</h3>
                        </div>
                        <div class="panel-body">
                            <div class="group-item">
                                <img src="img/group.png" alt="">
                                <h4><a href="{{ url('group') }}" class="">Sample Group One</a></h4>
                                <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="group-item">
                                <img src="img/group.png" alt="">
                                <h4><a href="{{ url('group') }}" class="">Sample Group Two</a></h4>
                                <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="group-item">
                                <img src="img/group.png" alt="">
                                <h4><a href="{{ url('group') }}" class="">Sample Group Three</a></h4>
                                <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                            </div>
                            <div class="clearfix"></div>
                            <a href="{{ url('group') }}" class="btn btn-primary">View All Groups</a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>Copyright &copy - {{ date('Y') }}</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
