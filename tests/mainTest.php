<?php 

use App\Service\PaymentService;

/**
 * 
 */
class paymentTest extends PHPUnit_Framework_TestCase
{

	public function setTest()
	{
		return $service = new PaymentService('./input.json');

	}

	public function test()
	{
		$service = new PaymentService('./input.json');

		$this->assertEquals(7.99, $service->count($service->jsonDecode(), 0, []));
	}
}
