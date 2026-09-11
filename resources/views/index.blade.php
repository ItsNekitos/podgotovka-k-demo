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
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('img/diploma.webp') }}" alt="">
                        </div>
                        <div class="card-desc">
                            <div class="card-desc-head">
                                <p>Такойто то зал</p>
                            </div>
                            <div class="card-desc-desc">
                                <p>Он находится тут та там та там ваще комфортик</p>
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


                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('img/12fe2c7de382debb49c.jpg') }}" alt="">
                        </div>
                        <div class="card-desc">
                            <div class="card-desc-head">
                                <p>Такойто то зал</p>
                            </div>
                            <div class="card-desc-desc">
                                <p>Он находится тут та там та там ваще комфортик</p>
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




                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('img/e0aa2a26192b2d5bd69.jpg') }}" alt="">
                        </div>
                        <div class="card-desc">
                            <div class="card-desc-head">
                                <p>Такойто то зал</p>
                            </div>
                            <div class="card-desc-desc">
                                <p>Он находится тут та там та там ваще комфортик</p>
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


                </div>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer/>
</body>

</html>