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
                    <a href="{{ route('adminpanel',['page' => 'create']) }}">Создать помещение</a>
                    <a href="{{ route('adminpanel',['page' => 'spisok']) }}">Список помещений</a>
                </div>
                <div id="zagolovok">
                    <h1>Редактировать место</h1>
                </div>
                @foreach ($places as $place)
                
                    <form action="{{ Route('placeupdate', $place->id) }}" method="post" enctype="multipart/form-data" style="height:auto;">
                        @csrf
                        <div class="card" style="width:85%; height:900px;">
                            <div class="card-img">
                                <img src="{{ asset($place->photo) }}" alt="">
                            </div>
                            <div class="card-desc">
                                <div class="card-desc-head">
                                    <label for="placename">Название</label>
                                    <input id="placename" type="text" value="{{ $place->name }}" name="placename" placeholder="Название">
                                </div>
                                @error('placename')
                                <div class="alert">{{ $message }}</div>
                                @enderror

                                <div class="card-desc-desc">
                                    <label for="descplace">Описание</label>
                                    <textarea id="descplace" type="text" name="descplace" placeholder="Описание">{{ $place->desc }}</textarea>
                                </div>
                                @error('descplace')
                                <div class="alert">{{ $message }}</div>
                                @enderror

                                <div>
                                    <label for="photoplace">Фото</label>
                                    <input id="photoplace" type="file" name="photoplace">
                                </div>
                                @error('photoplace')
                                <div class="alert">{{ $message }}</div>
                                @enderror

                                    <button class="card-desc-button" type="submit" style="width:80%; height:100px;">Редактировать</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer />
</body>

</html>