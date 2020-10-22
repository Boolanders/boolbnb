<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top header">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('./img/stemma.png') }}" alt="not found">
                </a>
            </div>
            <div class="col-md-8">
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input id="search-address-input" class="form-control my-0 py-1 red-border" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
            <div class="col-md-2">
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
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('profile', Auth::user() -> id) }}">
                                My Profile
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
</nav>

