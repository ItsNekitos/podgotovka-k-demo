<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<body>
    <x-header />
    <main>
        <div id="maindiv">
            <div class="sidediv"></div>
            <div id="osnova">
                <div id="zagolovok">
                    <h1>Вход</h1>
                </div>
                <form action="{{ Route('login') }}" method="get">
                    @csrf
                    <div>
                        <label>Ваше имя</label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Имя">
                        @error('name')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Пароль</label>
                        <input type="password" name="password" placeholder="Введите пароль">
                        @error('password')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" style="background-color:rgb(244, 126, 0); border-color: rgb(170, 88, 0);">Войти</button>
                        <a href="{{ Route('viewregister') }}">Нет аккаунта? Зарегестрируйтесь</a>
                    </div>
                </form>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer/>
</body>

</html>