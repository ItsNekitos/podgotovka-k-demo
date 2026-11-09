<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<body>
    <x-header />
    <main>
        <div id="maindiv">
            <div class="sidediv"></div>
            <div id="osnova">
                <div id="switch">
                    <a href="{{ route('adminpanel',['page' => 'zakaz']) }}">Заказы</a>
                    <a href="{{ route('adminpanel',['page' => 'create']) }}" class="selected">Создать помещение</a>
                    <a href="{{ route('adminpanel',['page' => 'spisok']) }}">Список помещений</a>
                </div>
                

                <div id="zagolovok">
                    <h1>Создать помещение</h1>
                </div>
                <article>
                    <div>
                        <form action="{{ Route('placeform') }}" method="post" enctype="multipart/form-data" style="height:auto;">
                            @csrf
                            <div>
                                <label for="name">Название</label>
                                <input id="name" type="text" value="{{ old('name') }}" name="name" placeholder="Название">
                            </div>
                            @error('name')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                            <div>
                                <label for="desc">Описание</label>
                                <input id="desc" type="text" value="{{ old('desc') }}" name="desc" placeholder="Описание">
                            </div>
                            @error('desc')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                            <div>
                                <label for="photo">Фото</label>
                                <input id="photo" type="file" name="photo">
                            </div>
                            @error('photo')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                            <button type="submit" style="margin-bottom:20px; margin-top: 20px;">Добавить</button>
                        </form>
                    </div>
                </article>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer />
</body>

</html>