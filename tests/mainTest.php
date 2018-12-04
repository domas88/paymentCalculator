<?php 

use App\Service\PaymentService;

class paymentTest extends PHPUnit_Framework_TestCase
{
	public function setTest()
	{
		return $service = new PaymentService('./input.json');
	}

	public function test()
	{
		$service = new PaymentService('./input.json');
		$input = $service->jsonDecode();

		$this->assertEquals($service->count(6, $input['sms_list'], 2), 
			[0 => 3, 1 => 3, 2 => 0.5]);
	}
}
