    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <header>
        <div class="headerside"></div>
        <div class="logo">
            <img src="{{ asset('img/etazhi-logotip-vektor-48.jpg') }}" alt="">
        </div>
        <div class="headercenter"></div>
        <div class="headerprofile">
            @if (!Auth::user())
            <a href="{{ route('viewregister') }}">Register</a>
            @endif
            @auth
            @if (Auth::user()->role == 'admin')
            <a href="{{ route('adminpanel') }}">Panel</a>
            @else
            <a href="{{ route('userprofileview') }}">Profile</a>
            @endif
            <a href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>
        <div class="headerside"></div>
    </header>