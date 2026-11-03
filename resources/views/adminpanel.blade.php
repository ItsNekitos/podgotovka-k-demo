<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<!-- Сделать помещения списком красиво и отзывы чтоб хотябы админ чекал или что то типа того -->
 <!-- Claude - я сделал эту часть кода. Если нужно еще что-то, сообщи -->
<body>
    <x-header />
    <main>
        <div id="maindiv">
            <div class="sidediv"></div>
            <div id="osnova">
                <div id="zagolovok">
                    <h1>Заказы</h1>
                </div>
                <article class="post">
                    <div id="zakazes">
                        <div class="zakaz">
                            <ul>
                                <li class="zid">ID</li>
                                <li class="zplace">Место</li>
                                <li class="zevent">Мероприятие</li>
                                <li class="ztime">Дата заказа</li>
                                <li class="zoplata">Оплата</li>
                                <li class="zstatus">Статус</li>
                                <li class="zbutton"></li>
                            </ul>
                        </div>
                        @foreach ($orders as $order)
                        <form action="{{ Route('orderedit', [$order->id]) }}" method="get">
                            @csrf
                            <ul>
                                <li class="list-group-item zid">{{$order->id}}</li>
                                <li class="list-group-item zplace">{{$order->place_name}}</li>
                                <li class="list-group-item zevent">{{$order->event}}</li>
                                <li class="list-group-item ztime">{{date('d.m.Y H:i:s',strtotime($order->date))}}</li>
                                @if($order->oplata == "perevod")
                                <li class="list-group-item zoplata">По карте</li>
                                @else
                                <li class="list-group-item zoplata">Наличные</li>
                                @endif
                                <li class="list-group-item zstatus" style="display: flex; flex-direction: column;">
                                    <select id="{{ $order->id }}Text" name="status">
                                        <option value="in_process" @if ($order->status=='in_process') selected @else @endif>Мероприятие назначено</option>
                                        <option value="new" @if ($order->status=='new') selected @else @endif>Новое</option>
                                        <option value="done" @if ($order->status=='done') selected @else @endif>Завершено</option>
                                        <option value="canceled" @if ($order->status=='canceled') selected @else @endif>Отменено</option>
                                    </select>
                                </li>
                                <li class="zbutton">
                                    <button type="submit">Сохранить</button>
                                </li>
                            </ul>
                        </form>
                        @endforeach
                    </div>
                </article>



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