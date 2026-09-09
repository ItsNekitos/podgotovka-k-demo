<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>123123123</header>
    <main>
        <form action="">
            <p class="authtext">Регистрация</p>
            <input type="text" placeholder="Email" v-model="email" /><br />
            <p class="red" v-if="errors.email">
                {{ errors.email.join('. ') }}
            </p>
            <input type="password" placeholder="Password" v-model="password" /><br />
            <p class="red" v-if="errors.password">
                {{ errors.password.join('. ') }}
            </p>
            <button type="button" @click="register" class="authbutton">Регистрация</button>
        </form>
    </main>
</body>

</html>