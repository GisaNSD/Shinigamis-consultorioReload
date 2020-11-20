<?php

namespace Tests\Unitarios\Services;

use PHPUnit\Framework\TestCase;
use App\Domain\Services\DeleteCoder;
use Tests\Unitarios\Double\DbMysqlFake;

class DeleteCoderTest extends TestCase
{

	public function test_delete_coder()
	{
        $coderId= 19;
        $repository= new DbMysqlFake;

        $deleteCoder= new DeleteCoder($repository);
        $result= $deleteCoder->execute($coderId);

		$this->assertEquals(19, $result);
    }
    
}