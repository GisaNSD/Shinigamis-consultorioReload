<?php 


namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Files\Logger;

class LoggerTest extends TestCase
{

	public function test_logger_is_string()
	{	
		$logger= new Logger();

		$result= $logger->getDate();

		$this->assertIsString($result);
	}

	public function test_message()
	{	
		$logger= new Logger();

		$result= $logger->getMessage("algoCorto");

		$this->assertIsString($result);
	}

/*	public function test_userIP()
	{
		$logger= new Logger();

		$result= $logger->getUserIP();
		
		$this->assertEquals(Null, $result);
	} */

	




}



?>