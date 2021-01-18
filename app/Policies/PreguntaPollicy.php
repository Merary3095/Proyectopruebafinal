<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pregunta;
use Illuminate\Auth\Access\HandlesAuthorization;

class PreguntaPollicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function responder(USer $usuario, Pregunta $pregunta)
    {
        return $usuario->rol == cliente && is_null($pregunta->respuesta);
    }
}
*/