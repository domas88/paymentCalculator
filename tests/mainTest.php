<?php 

/**
 * 
 */
class paymentTest extends PHPUnit_Framework_TestCase
{
	
	public function testAdd()
	{
		$test = new App\Service\test;
		$this->assertEquals(4, $test->add(2, 2));
	}
}




 ?>