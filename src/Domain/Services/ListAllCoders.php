<?php

namespace App\Domain\Services;

use App\Domain\Contracts\IDbSelection;

class ListAllCoders{

    private IDbSelection $repository;

    public function __construct(IDbSelection $repository)
    {
        $this->repository= $repository;
    }

    public function execute(){

        $allCoders= $this->repository->listAllCoders();
        return $allCoders;
    }
}

?>