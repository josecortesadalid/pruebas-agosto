<?php

namespace App;

use Illuminate\Contracts\Support\Htmlable;

class Titulo implements Htmlable
{
    public function toHtml()
    {
        return "<h1>Esto es el título</h1>";
    }
}

?>