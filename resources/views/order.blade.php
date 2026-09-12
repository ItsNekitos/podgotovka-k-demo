<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('css/order.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<body>
    <x-header />
    <main>
        <div id="maindiv">
            <div class="sidediv"></div>
            <div id="osnova">
                <div id="zagolovok">
                    <h1>Заказ</h1>
                </div>
                <form action="{{ Route('orderform') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Название места</label>
                            <input type="text" value="{{ old('place_name') }}" name="place_name" placeholder="Введите название места">
                        </div>
                        @error('place_name')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label>Дата и время доставки</label>
                            <input type="datetime-local" value="{{ old('date') }}" name="date">
                        </div>
                        @error('date')
                        <div class="alert">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label>Способ оплаты</label>
                            <select name="oplata">
                                <option value="nal">Наличные</option>
                                <option value="perevod">По карте</option>
                            </select>
                        </div>
                        <div id="button">
                            <button type="submit" class="btn btn-primary">Заказать</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="sidediv"></div>
        </div>
    </main>
    <x-footer />
</body>

</html>