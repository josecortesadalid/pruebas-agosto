@include('partials.comun')

<div class="container">

    <h1 class="my-5 text-center"> Crea un mensaje </h1>

    <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <form 
        method="POST" 
        action="{{ route('mensajes.store') }}" 
        class="bg-white shadow rounded p-2 p-md-4"
        enctype="multipart/form-data">  
        @include('_form', ['btnText' => 'Guardar', $users])
        </form>
    </div>
    </div>

</div>
</body>
</html>