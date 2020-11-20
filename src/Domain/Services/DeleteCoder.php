<?php

namespace App\Domain\Services;

use App\Domain\Contracts\IDbSelection; 
use App\Models\Coder;
use App\Infrastructure\Repositories\DbMysql;

class DeleteCoder{

    private IDbSelection $repository;

    public function __construct(IDbSelection $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id){

        $coderToDelete= $this->repository->findById($id);
        $this->repository->coderDelete($id);
        return $coderToDelete;
     
    }
    
}

?>