<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Este es el usuario: {{ $user->name }}
    <p>
        <a href=" {{ route('mensajes.show', $msg->id) }} ">
            Click para ver el mensaje
        </a>
    </p>
</body>
</html>