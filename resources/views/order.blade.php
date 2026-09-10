<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ Route('orderform') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <p>Название места</p>
                <input type="text" value="{{ old('place_name') }}" name="place_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название места">
                @error('place_name')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Дата и время доставки</label>
                <input type="datetime-local" value="{{ old('date') }}" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Способ оплаты</label>
                <select class="form-control" id="exampleInputEmail1" name="oplata" id="filt">
                    <option value="nal">Наличные</option>
                    <option value="perevod">По карте</option>
                </select>
            </div>
            <div id="button">
                <button type="submit" class="btn btn-primary">Заказать</button>
            </div>
        </div>
    </form>
</body>

</html>