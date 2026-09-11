<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/user.css') }}">

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
                            </ul>
                        </div>
                        @foreach ($orders as $order)
                        <div class="zakaz">
                            <ul class="list-group list-group-horizontal" style="width: 100%;">
                                <li class="list-group-item zid">{{$order->id}}</li>
                                <li class="list-group-item zname">{{$order->place_name}}</li>
                                <li class="list-group-item ztime">{{$order->date}}</li>
                                @if($order->oplata == "perevod")
                                <li class="list-group-item zoplata">По карте</li>
                                @else
                                <li class="list-group-item zoplata">Наличные</li>
                                @endif
                                <li class="list-group-item zstatus" style="display:flex; flex-direction: column;">
                                    <h4 style="height: 25%; display: flex; align-items: center; justify-content: center;">
                                        @if($order->status == "in_process")
                                        В работе
                                        @elseif($order->status == "done")
                                        Готово
                                        @elseif($order->status == "canceled")
                                        Отменен
                                        @endif
                                    </h4>
                                </li>
                            </ul>
                            <div id="comments">
                                <div style="width:100%; display: flex; flex-direction:column; justify-content:start; margin-left: 50px;">
                                    <label for="">Отзывы:</label>
                                    @foreach ($comments as $comment)
                                    @if ($comment->order_id == $order->id)
                                    <div style="margin-left: 20px;">
                                        <p style="font-size:20px;">{{ $comment->user->name }}</p>
                                        <p style="margin-left: 10px; margin-bottom: 15px; margin-top: 5px; color:rgb(55,55,55);">{{ $comment->description }}</p>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @if($order->status == "done")
                                <label for="">Оставить отзыв</label>
                                <form action="{{ Route('comment', [$order->id]) }}" method="post">
                                    <input name="description" id="" />
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit">Оставить</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </article>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
</body>

</html>