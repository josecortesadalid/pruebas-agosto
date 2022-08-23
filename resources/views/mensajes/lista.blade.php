@include('partials.comun')

<div class="container">

<div class="mx-auto my-5" style="width: 200px;">
    <h1>Lista de mensajes</h1>
</div>

    <ul class="m-0 p-0">
        @forelse($mensajes as $mensaje)
        uno
                @if($mensaje->imagen)
                {{ $mensaje->imagen }}
                <img src="/storage/{{ $mensaje->imagen }}" alt="el alt">
                @endif
            <br>
            @empty
            <li>No hay proyectos</li>
        @endforelse
    </ul>
<br><br><br>

<img src="\storage\app\public\S57hB0cRVpm3y9MhS7M7XeYyvl7HmUtiCQ9VjqxV.gif" alt="el alt" style="height:200px; object-fit: cover">

<!-- storage\app\public\S57hB0cRVpm3y9MhS7M7XeYyvl7HmUtiCQ9VjqxV.gif -->
</div>

</body>
</html>

