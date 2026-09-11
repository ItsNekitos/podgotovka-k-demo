<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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
                                <li>№</li>
                                <li>Место</li>
                                <li>Дата заказа</li>
                                <li>Оплата</li>
                                <li>Статус</li>
                                <li></li>
                            </ul>
                        </div>
                        @foreach ($orders as $order)
                        <form action="{{ Route('orderedit', [$order->id]) }}" method="get">
                            @csrf
                            <ul>
                                <li class="list-group-item zid">{{$order->id}}</li>
                                <li class="list-group-item zdate">{{$order->place_name}}</li>
                                <li class="list-group-item zadress">{{$order->date}}</li>
                                @if($order->oplata == "perevod")
                                <li class="list-group-item zoplata">По карте</li>
                                @else
                                <li class="list-group-item zoplata">Наличные</li>
                                @endif
                                <li class="list-group-item zstatus" style="display: flex; flex-direction: column;">
                                    <select id="{{ $order->id }}Text" name="status">
                                        <option value="in_process" @if ($order->status=='in_process') selected @else @endif>В работе</option>
                                        <option value="done" @if ($order->status=='done') selected @else @endif>Выполнено</option>
                                        <option value="canceled" @if ($order->status=='canceled') selected @else @endif>Отменено</option>
                                    </select>
                                </li>
                                <li>
                                    <button type="submit">Сохранить</button>
                                </li>
                            </ul>
                        </form>
                        @endforeach
                    </div>
                </article>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
</body>

</html>