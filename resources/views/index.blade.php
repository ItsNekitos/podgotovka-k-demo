<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/indexpage.css') }}">

<body>
    <x-header />
    <main>
        <div id="maindiv">
            <div class="sidediv"></div>
            <div id="osnova">
                <div id="zagolovok">
                    <h1>Залы для конференций</h1>
                </div>
                <div id="zali">
                    @foreach($places as $place)
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ $place->photo }}" alt="">
                        </div>
                        <div class="card-desc">
                            <div class="card-desc-head">
                                <p>{{ $place->name }}</p>
                            </div>
                            <div class="card-desc-desc">
                                <p>{{ $place->desc }}</p>
                            </div>
                            <div class="card-desc-button">
                                @auth
                                <div>
                                    <a href="orderview">Заказать</a>
                                </div>
                                @endauth
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