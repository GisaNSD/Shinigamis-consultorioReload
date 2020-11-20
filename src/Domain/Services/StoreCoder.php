<?php

namespace App\Domain\Services;

use App\Domain\Contracts\IDbSelection;
use App\Models\Coder;

class StoreCoder{

    private IDbSelection $repository;

    public function __construct(IDbSelection $repository)
    {
        $this->repository= $repository;
    }

    public function execute(array $data)
    {
        $coder= new Coder($data['name'], $data['subject']);
        $this->repository->storeCoder($coder);
        return $coder;
    }
}

?>