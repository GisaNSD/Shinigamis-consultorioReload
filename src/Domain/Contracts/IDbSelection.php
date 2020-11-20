<?php

namespace App\Domain\Contracts;
use App\Models\Coder;

Interface IDbSelection
{
    public function storeCoder(Coder $coder);
    public function listAllCoders();
    // public function dbUpdate();
    public function coderDelete(Coder $coder);
}

?>