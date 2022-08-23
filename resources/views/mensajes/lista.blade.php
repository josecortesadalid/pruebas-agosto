@include('partials.comun')

<div class="container">

<div class="mx-auto my-5" style="width: 200px;">
    <h1>Lista de mensajes</h1>
</div>

    <ul class="m-0 p-0">
        @forelse($mensajes as $mensaje)
                @if($mensaje->imagen)
                <img src="/storage/{{ $mensaje->imagen }}" alt="{{ $mensaje->nombre }}" style="height:200px; object-fit: cover">
                @endif
            <br>
            @empty
            <li>No hay proyectos</li>
        @endforelse
    </ul>
<br><br><br>


</div>

</body>
</html>

