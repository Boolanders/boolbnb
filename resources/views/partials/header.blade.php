
@php
    $usrId = Auth::user() -> id;

    $msgs = App\Apartment::where('user_id', '=', $usrId) 
            -> join('messages', 'messages.apartment_id', '=', 'apartments.id')
            -> where('messages.read', '=', '0')
            -> count();

@endphp
<header id="header">
    <div class="container-fluid">

      <div class="logo float-left">
        <a href="{{ url('/') }}"><img src={{ asset('./img/stemma.png') }} alt="" class="img-fluid"></a>
      </div>

      <button type="button" class="nav-toggle"><i class="fas fa-bars fa-1x"></i>
    
        @auth

            @if ($msgs)
                <div id="hamburger-dot" class="dot"></div>
            @endif
            
        @endauth
    
      </button>
      <nav class="nav-menu">
        <ul>
            @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="active">
                        <a class="nav-link">
                            <i class=" px-1 fas fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('profile', Auth::user() -> id) }}">
                            My Profile
                        </a>
                    </li> 
                    <li>
                        <a class="d-inline-block" href="{{ route('messages', Auth::user() -> id) }}">
                            My Messages
                            @auth

                                @if ($msgs)
                                    <div class="dot"></div>
                                @endif
                                
                            @endauth
                        </a>
                    </li>  
                    <li>
                        <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>      
                @endguest
          
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  



{{-- 

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top header">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 offset-xs-2 col-sm-6 offset-sm-3 col-md-2 offset-md-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('./img/stemma.png') }}" alt="not found">
                </a>
            </div>
            
            <div class="col-md-2 offset-md-8">
            @guest
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class=" px-1 fas fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('profile', Auth::user() -> id) }}">
                                My Profile
                            </a>

                            <a class="dropdown-item" href="{{ route('messages', Auth::user() -> id) }}">
                                My Messages
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

        </div>

    </div>
</nav> --}}

