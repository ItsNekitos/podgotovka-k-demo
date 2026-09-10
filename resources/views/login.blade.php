<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>123123123</header>
    <main>
            <form action="{{ Route('login') }}" method="get">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ваше имя</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputPassword1" placeholder="ФИО">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:rgb(244, 126, 0); border-color: rgb(170, 88, 0);">Войти</button>
                <a style="margin-left: 25px;" href="{{ Route('viewregister') }}">Регистрация</a>
            </form>
    </main>
</body>

</html>