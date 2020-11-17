<?php 


namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Files\Logger;

class LoggerTest extends TestCase
{

	public function test_logger_is_string()
	{	
		$logger= new Logger("date", "Holis", "usuario");

		$result= $logger->getDate();

		$this->assertIsString($result);
	}

}



?>