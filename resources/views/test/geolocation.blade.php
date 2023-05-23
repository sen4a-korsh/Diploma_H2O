<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
            crossorigin="anonymous"></script>
</head>
<body>

<form id="location-form">
    <button type="submit">Отправить мою геолокацию</button>
</form>

<div id="location-message"></div>



<script>
    // Получаем форму и контейнер для сообщения
    const form = document.getElementById('location-form');
    const message = document.getElementById('location-message');

    // Обработчик отправки формы
    form.addEventListener('submit', (event) => {
        // Отменяем стандартное поведение формы
        event.preventDefault();

        // Запрашиваем геолокацию пользователя
        setInterval(function() {
            navigator.geolocation.getCurrentPosition(

                    (position) => {
                        console.log(`lat=${position.coords.latitude}&lng=${position.coords.longitude}`);

                        // Отправляем координаты на сервер
                        // const xhr = new XMLHttpRequest();
                        // xhr.open('POST', '/geolocation');
                        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        // xhr.onload = () => {
                        //     if (xhr.status === 200) {
                        //         // Выводим сообщение об успешной отправке
                        //         message.innerHTML = 'Геолокация успешно отправлена на сервер';
                        //     } else {
                        //         // Выводим сообщение об ошибке
                        //         message.innerHTML = 'Ошибка отправки геолокации на сервер';
                        //     }
                        // };
                        // xhr.send(`lat=${position.coords.latitude}&lng=${position.coords.longitude}`);
                    }

                // (error) => {
                //     // Выводим сообщение об ошибке получения геолокации
                //     message.innerHTML = 'Ошибка получения геолокации: ' + error.message;
                // }
            );
        }, 5000);
    });
</script>


</body>
</html>

