<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    @php
        $html = "<h1>Esto es el título</h1>";
    @endphp
    <h1> Esto es una prueba </h1>
    {!! strip_tags($html, '<h1>') !!}

</body>
</html>