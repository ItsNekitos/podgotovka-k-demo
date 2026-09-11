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
            <form action="{{ Route('orderedit', [$order->id]) }}" method="get">
                @csrf
                <ul class="list-group list-group-horizontal" style="width: 100%;">
                    <li class="list-group-item zid">{{$order->id}}</li>
                    <li class="list-group-item zdate">{{$order->place_name}}</li>
                    <li class="list-group-item zadress">{{$order->date}}</li>
                    <li class="list-group-item zstatus" style="display: flex; flex-direction: column;">
                        <select style="height: 70%;" class="form-control statusSelect" id="{{ $order->id }}Text" name="status">
                            <option value="in_process" @if ($order->status=='in_process') selected @else @endif>В работе</option>
                            <option value="done" @if ($order->status=='done') selected @else @endif>Выполнено</option>
                            <option value="canceled" @if ($order->status=='canceled') selected @else @endif>Отменено</option>
                        </select>
                    </li>
                    @if($order->oplata == "perevod")
                    <li class="list-group-item zoplata">По карте</li>
                    @else
                    <li class="list-group-item zoplata">Наличные</li>
                    @endif
                </ul>
                <button type="submit">Save</button>
            </form>
            @endforeach
        </div>
    </article>
</body>

</html>