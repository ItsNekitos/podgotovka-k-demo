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
                @foreach ($orders as $order)
                <article class="post">
                    <div id="zakazes">
                        <div class="zakaz">
                            <ul>
                                <li>Место</li>
                                <li>Мероприятие</li>
                                <li>Дата заказа</li>
                                <li>Оплата</li>
                                <li>Статус</li>
                            </ul>
                        </div>
                        <div class="zakaz">
                            <ul class="list-group list-group-horizontal" style="width: 100%;">
                                <li class="list-group-item zname">{{$order->place_name}}</li>
                                <li>{{ $order->event }}</li>
                                <li class="list-group-item ztime">{{date('d.m.Y H:i:s',strtotime($order->date))}}</li>
                                @if($order->oplata == "perevod")
                                <li class="list-group-item zoplata">По карте</li>
                                @else
                                <li class="list-group-item zoplata">Наличные</li>
                                @endif
                                <li class="list-group-item zstatus">
                                    <h4>
                                        @if($order->status == "in_process")
                                        Мероприятие назначено
                                        @elseif($order->status == "new")
                                        Новое
                                        @elseif($order->status == "done")
                                        Завершено
                                        @elseif($order->status == "canceled")
                                        Отменен
                                        @endif
                                    </h4>
                                </li>
                            </ul>
                            <div id="comments">
                                @if($order->status == "done")
                                <label for="comment">Оставить отзыв</label>
                                <form action="{{ Route('comment', [$order->id]) }}" method="post">
                                    <textarea id="comment" name="description" id=""></textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button style="margin-bottom:10px;" type="submit">Оставить</button>
                                </form>
                                <div style="width:100%; display: flex; flex-direction:column; justify-content:start; margin-left: 50px;">
                                    <label for="">Отзывы:</label>
                                    @foreach ($comments as $comment)
                                    @if ($comment->order_id == $order->id)
                                    <div style="width:95%; margin-left: 20px; border: 2px solid #0d47a1; border-radius: 7px; margin:0 10px 10px 0; padding-left: 10px;">
                                        <p style="font-size:20px;">{{ $comment->user->name }}</p>
                                        <p style="margin-left: 10px; margin-bottom: 15px; margin-top: 5px; color:rgb(55,55,55);">{{ $comment->description }}</p>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer />
</body>

</html>