<?php 

use App\Service\paymentService;

/**
 * 
 */
class paymentTest extends PHPUnit_Framework_TestCase
{

	public function setTest()
	{
		return $smsService = new paymentService('./input.json');

	}

	public function setSmsArray()
	{
		return $actTest = $this->setTest()->jsonDecode();
	}
	
	public function setCounter()
	{
		return $actTest = $this->setTest()->counter($this->setSmsArray());
	}
}




 ?>