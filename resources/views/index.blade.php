<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-header/>
    <main>
        @auth
        <div>
            <a href="orderview">Zakazt</a>
        </div>
        @endauth
    </main>
</body>
</html>