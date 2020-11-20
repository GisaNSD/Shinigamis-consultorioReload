<?php

namespace App\Domain\Contracts;
use App\Models\Coder;

Interface IDbSelection
{
    //public function dbCreate($name, $subject);
    // public function dbRead();
    // public function dbUpdate();
    public function coderDelete(Coder $coder);
}

?>