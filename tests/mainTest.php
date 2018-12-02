<?php 

/**
 * 
 */
class paymentTest extends PHPUnit_Framework_TestCase
{
	
	public function testAdd()
	{
		$test = new App\Service\paymentService('./input.json');
		$this->assertEquals(8, $test->counter());
	}
}




 ?>