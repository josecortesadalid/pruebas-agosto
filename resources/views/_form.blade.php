@csrf

@php
        echo($users);
    @endphp
<div class="form-group">
        <label for="recipient_id">Envíelo a un usuario</label>
        <select 
        name="recipient_id" 
        id="recipient_id"
        class="form-control "
        >
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
            <!-- <option value="{{ $user->id }}"> {{ $user->image }} </option>  -->
        @endforeach
        </select>
    </div>

    <div class="mb-3">
    <label for="formFile" class="form-label">Imagen de la firma</label>
    <input class="form-control" type="file" name="imagen" id="formFile">
    </div>


<button class="btn btn-primary btn-lg btn-block mt-3"> Guardar </button>