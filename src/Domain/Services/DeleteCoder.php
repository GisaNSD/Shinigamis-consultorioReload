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

        $this->repository->coderDelete($id);
        // $DbMysql= new DbMysql;
        // $DbMysql->coderDelete($id);
    }
    
}

?>