<nav class="navbar navbar-default navbar-static-top">
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
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if (!Auth::guest())
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/specialists') }}">Specialist</a></li>
                <li><a href="{{ url('specialists/create') }}">Create</a></li>
            </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; ">
                            <img src="{{asset('..'.Auth::getUser()->avatar)}}" style="width:32px; height: 32px; top:10px; left:10px; border-radius: 50%; margin-right: 25px;">
                            {{ Auth::getUser()->email }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            
                            <li><a href="{{ url('/profile',Auth::getUser()->id) }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                            <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-out"></i>Admin panel</a></li>
                            <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>