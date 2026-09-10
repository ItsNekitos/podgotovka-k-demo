<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
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
    </header>
    <main>
        @auth
        <div>
            <a href="orderview">Zakazt</a>
        </div>
        @endauth
    </main>
</body>
</html>