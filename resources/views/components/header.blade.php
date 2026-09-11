    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <header>
        <div class="headerside"></div>
        <div class="logo">
            <img src="{{ asset('img/etazhi-logotip-vektor-48.jpg') }}" alt="">
        </div>
        <div class="headercenter">
            <a href="{{ route('homepage') }}">Конференции.РФ</a>
        </div>
        <div class="headerprofile">
            @if (!Auth::user())
            <div>
                <a href="{{ route('viewregister') }}">Регистрация</a>
            </div>
            @endif
            @auth
            <div>
                @if (Auth::user()->role == 'admin')
                <a href="{{ route('adminpanel') }}">Панель</a>
                @else
                <a href="{{ route('userprofileview') }}">Профиль</a>
                @endif
            </div>
            <div>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
            @endauth
        </div>
        <div class="headerside"></div>
    </header>