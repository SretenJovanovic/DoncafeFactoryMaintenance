<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        
    <a class="navbar-brand" 
        @if(!Auth::guest())
            href="/profile/{{ Auth::user()->id }}"
        @endif
            href="{{ url('/login') }}">

        <img style="height:40px" src="{{ asset('img/logo.png') }}">
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <div class="collapse navbar-collapse textPrimary" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @if(!Auth::guest())
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="/reminder/{{ Auth::user()->id }}">Podsetnik</a>
                        </li>
                        @endif
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="#">Prijave kvara</a>
                        </li>
                        <!-- Dropdown 1 -->
                        <li class="nav-item mr-3 dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Oprema</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Spisak opreme</a>
                                <a class="dropdown-item" href="#">Karton opreme</a>
                                <a class="dropdown-item" href="#">Plan preventivnog odrzavanja</a>
                                <!--<div class="dropdown-divider"></div>-->
                                <!-- RAZMAK IZMEDJU 2 itema-->
                                <a class="dropdown-item" href="#">Plan preventivnog po zaposlenom</a>
                            </div>
                        </li>
                        
                        <!-- Dropdown 2 -->
                        <li class="nav-item mr-3 dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Merna oprema</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/mernaOprema/spisak">Spisak merne opreme</a>
                                <a class="dropdown-item" href="/mernaOprema/planPeriodicnogPregleda/show">Plan periodicnog pregleda</a>
                                <a class="dropdown-item" href="/mernaOprema/karton">Karton merne opreme</a>
                                <a class="dropdown-item" href="/internaKalibracija/spisak">Interna kalibracija</a>
                            </div>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="#">Uputstva</a>
                        </li>
                    </ul>
                </div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Prijavi se') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a  id="navbarDropdown" 
                            class="nav-link dropdown-toggle" 
                            href="#" 
                            role="button" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false" 
                            v-pre>
                            <span style="font-size:18px">
                                {{ Auth::user()->name }} 
                                {{ Auth::user()->last_name }}
                            </span> 
                            <span class="caret">
                                
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" style="width:160px;text-align:center; margin-top:10px;" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Izloguj se') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        
</nav>