<?php 

use App\Service\PaymentService;

/**
 * 
 */
class paymentTest extends PHPUnit_Framework_TestCase
{

	public function setTest()
	{
		return $smsService = new PaymentService('./input.json');

	}

	public function jsonDecode()
	{
		return $actTest = $this->setTest()->jsonDecode();
	}
	
	public function setCount()
	{
		return $actTest = $this->setTest()->count($this->setSmsArray());
	}
}
