<?php

namespace App\Domain\Services;

use App\Models\Coder;
use App\Domain\Contracts\IDbSelection;

class CreateNewCoder {

    public function save(){

        $newCoder= new Coder;
    }
}
//Aquí iría enviar mail de confirmación cada vez que se crea un nuevo coder.
?>