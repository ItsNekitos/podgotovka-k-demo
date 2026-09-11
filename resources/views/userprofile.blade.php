<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <x-header/>
    <p>profile</p>


    <h1 style="margin: 15px;">Заказы</h1>
    <article class="post">
        <div id="zakazes">
            <div class="zakaz">
                <ul class="list-group list-group-horizontal" style="width: 100%;">
                    <li class="list-group-item zid" style="color: rgb(155,155,155);">№</li>
                    <li class="list-group-item zname" style="color: rgb(155,155,155);">Mesto</li>
                    <li class="list-group-item zstatus" style="color: rgb(155,155,155);">Статус</li>
                    <li class="list-group-item ztime" style="color: rgb(155,155,155);">Дата заказа</li>
                    <li class="list-group-item zcancel" style="color: rgb(155,155,155);">Oplata</li>
                </ul>
            </div>
            @foreach ($orders as $order)
            <div class="zakaz">
                <ul class="list-group list-group-horizontal" style="width: 100%;">
                    <li class="list-group-item zid">{{$order->id}}</li>
                    <li class="list-group-item zname">{{$order->place_name}}</li>
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
                    <li class="list-group-item ztime">{{$order->date}}</li>
                    <li class="list-group-item zbutton">{{ $order->oplata }}</li>
                </ul>
                @if($order->status == "done")
                <form action="{{ Route('comment', [$order->id]) }}" method="post">
                    <input name="description" id="" />
                    <button type="submit">submit</button>
                </form>
                @endif
                @foreach ($comments as $comment)
                @if ($comment->order_id == $order->id)
                <div>
                    <p>{{ $comment->description }}</p>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </article>
</body>

</html>