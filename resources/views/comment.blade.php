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
                @if (Auth::user()->role == 'admin')
                <div id="switch">
                    <a href="{{ route('adminpanel',['page' => 'zakaz']) }}">Заказы</a>
                    <a href="{{ route('adminpanel',['page' => 'create']) }}">Создать помещение</a>
                    <a href="{{ route('adminpanel',['page' => 'spisok']) }}">Список помещений</a>
                </div>
                @endif
                <div id="zagolovok">
                    <h1>Заказ</h1>
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
                                    <select id="{{ $order->id }}Text" name="status" disabled>
                                        <option value="in_process" @if ($order->status=='in_process') selected @else @endif>Мероприятие назначено</option>
                                        <option value="new" @if ($order->status=='new') selected @else @endif>Новое</option>
                                        <option value="done" @if ($order->status=='done') selected @else @endif>Завершено</option>
                                        <option value="canceled" @if ($order->status=='canceled') selected @else @endif>Отменено</option>
                                    </select>
                                </li>
                                <li class="zbutton">

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
                        </div>
                        <form action="{{ Route('comment', [$order->id]) }}" method="post" style="height:200px;">
                            <textarea id="comment" name="description" style="width:96%; height:80%; margin-top:5px; margin-bottom:5px; padding:5px;" placeholder="Оставьте ответ"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button style="height:100px; margin:10px;" type="submit">Оставить</button>
                        </form>
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