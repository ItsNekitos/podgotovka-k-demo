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
                    <a href="{{ route('adminpanel',['page' => 'spisok']) }}" class="selected">Список помещений</a>
                </div>


                <div id="zagolovok">
                    <h1>Список помещений</h1>
                </div>
                <div style="display: flex; flex-direction:column; align-items:center;">
                    @foreach($places as $place)
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset($place->photo) }}" alt="">
                        </div>
                        <div class="card-desc">
                            <div class="card-desc-head">
                                <p>{{ $place->name }}</p>
                            </div>
                            <div class="card-desc-desc">
                                <p>{{ $place->desc }}</p>
                            </div>
                            <div class="card-desc-button">
                                <div>
                                    <a href="{{ route('placeview',['placeid'=>$place->id]) }}" class="card-desc-button" type="submit" style="width:80%; height:100px;">Редактировать</a>
                                </div>
                            </div>
                            <div style="width: 100%; height:35%; display:flex; justify-content:center;">
                                <a href="{{ route('placedelete',['placeid'=>$place->id]) }}" style="width: 90%; height:70px; background-color:red; display:flex; align-items:center; justify-content:center; text-decoration:none; color:white; border:solid 2px; border-radius:10px; border-color:rgb(175, 0, 0); margin-top:10px;">Удалить</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer />
</body>

</html>