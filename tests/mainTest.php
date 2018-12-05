<?php 

use App\Service\PaymentService;

class PaymentTest extends PHPUnit_Framework_TestCase
{
	public function setTest()
	{
		return $service = new PaymentService('./input.json');
	}

	public function test()
	{
		$service = new PaymentService('./input.json');
		$input = $service->jsonDecode();

		$this->assertEquals($service->count($input['required_income'], $input['sms_list'], $input['max_messages']), 
			[0 => 3, 1 => 3, 2 => 3, 3 => 3, 4 => 2, 5 => 0.5]);
	}
}
