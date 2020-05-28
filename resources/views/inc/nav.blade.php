  <!--nav start -->
  <nav class="navbar navbar-expand-md navbar-light main-nav">
    <div class="container-nav">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'LaraUltiPro') }}
        </a>
       <div class="navbar-search">
        <!--form start-->
       <form action="{{route('search')}}" method="GET" class="navbar-search__form">
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group">
                    <input type="text" class="form-control" value="{{request()->input('query')}}" name="query"
                        id="query" placeholder="Search...">
                        <button class="navbar-search__button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <!--form end-->
       </div>  <!--serch form end-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fa fa-bars navbar-toggler-menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ">
                <li class="nav-item">
                <a href="{{route('about')}}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                <a href="{{route('contact')}}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                <a href="{{route('services')}}" class="nav-link">Services</a>
                </li>
            
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.profile.index') }}">
                                <i class="fa fa-cog mt-4"></i> User Profile
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div> 
    <!--nav-container end -->
</nav>
<!--nav end -->