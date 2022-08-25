@include('partials.comun')

<div class="container mb-5 col-lg-5">
<h1 class="my-5 text-center"> {{ $post->titulo }} </h1>

{{ $post->body }}

</div>
</body>
</html>