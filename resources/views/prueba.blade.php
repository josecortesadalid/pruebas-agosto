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
        $html = "<h1>Esto es el título</h1><script>alert('xss')</script><a onclick='alert(\"xss\")' href='#'>link</a>";
    @endphp
    <h1> Esto es una prueba </h1>

    <!-- con este se ejecutaria el script -->
    <!-- {!! $html !!}  -->

    <!-- No queremos que ejecute los scripts pero sí los h1, para eso, como segundo parámetro le podemos poner una lista de los elementos permitidos -->
    <!-- {!! strip_tags($html, '<h1><p>') !!} -->

        {!! Purify::clean($html) !!}
        <!-- si inspeccionas el link, verás que no hace el onclick -->


</body>
</html>