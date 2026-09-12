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
                    <h1>Регистрация</h1>
                </div>
                <form action="{{ Route('register') }}" method="post">
                    @csrf
                    <div>
                        <label>Логин</label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Логин">
                    </div>
                    @error('name')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div>
                        <label>E-mail</label>
                        <input type="email" value="{{ old('email') }}" name="email" placeholder="Введите E-mail">
                    </div>
                    @error('email')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div>
                        <label>Телефон</label>
                        <input type="tel" type="phone" value="{{ old('phone') }}" name="phone" placeholder="Введите номер телефона в формате: 8(950)-999-99-99">
                    </div>
                    @error('phone')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div>
                        <label>Пароль</label>
                        <input type="password" name="password" placeholder="Введите пароль">
                    </div>
                    @error('password')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div>
                        <button type="submit" style="background-color:rgb(244, 126, 0); border-color: rgb(170, 88, 0);">Зарегистрироваться</button>
                        <a href="{{ Route('viewlogin') }}">Вход в аккаунт</a>
                    </div>
                </form>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer />
</body>

</html>