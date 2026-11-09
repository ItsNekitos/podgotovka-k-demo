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
                    <a href="{{ route('adminpanel',['page' => 'zakaz']) }}" class="selected">Заказы</a>
                    <a href="{{ route('adminpanel',['page' => 'create']) }}">Создать помещение</a>
                    <a href="{{ route('adminpanel',['page' => 'spisok']) }}">Список помещений</a>
                </div>
                <div id="zagolovok">
                    <h1>Заказы</h1>
                </div>
                @foreach ($orders as $order)
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

                        <div>
                            <div style="margin-left: 20px;">
                                @foreach ($order->comment as $comment)
                                <div style="border: 2px solid #0d47a1; border-radius: 7px; margin:0 10px 10px 0; padding-left: 10px;">
                                    <p style="font-size:20px;">{{ $comment->user->name }}</p>
                                    <div>
                                        <p style="margin-left: 10px; margin-bottom: 15px; margin-top: 5px; color:rgb(55,55,55);">{{ $comment->description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('commentview',['orderid'=>$order->id]) }}" style="width: 90%; height:90px; margin:0 auto; background-color:#007bff; display:flex; align-items:center; justify-content:center; text-decoration:none; color:white; border:solid 2px; border-radius:10px; border-color:#0d47a1; margin-bottom:10px;">Написать ответ</a>
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