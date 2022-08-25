@include('partials.comun')

<div class="container mb-5">
<h1 class="my-5 text-center"> Posts </h1>
@foreach ($posts as $post)
    <div class="card mb-3">
    <div class="card-body">
        {{ $post->titulo }}
    </div>
    </div>

@endforeach


</div>
</body>
</html>