<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Options implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes){

        return json_decode($value); // veremos un array en lugar de un string
    }

    public function set($model, string $key, $value, array $attributes){
        return json_encode($value); // codificamos el valor para que se guarde en la base de datos. Queremos que se almacene un string
    }

    // En la base de datos debe de guardarse un string, pero a la hora de obtenerlo, lo que queremos es un objeto

}
