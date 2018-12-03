<?php 

namespace App\Service;

/**
 * 
 */
class paymentService
{
	private $jsonStr;
	
	function __construct($arg)
	{
		$this->jsonStr = $arg;
	}

	public function jsonDecode() 
	{
		$json = file_get_contents($this->jsonStr);
		$jsonDecoded = json_decode($json, true);

		return $jsonDecoded;
	}

	public function counter($array)
	{
		$smsToSend = array();
		$numbersOverPrice = array();
		$smsInput = $array;
		$price = $smsInput['required_income'];
		$maxSms = $smsInput['max_messages'];
		$errorMsg = '';
		$number = 0;

		for ($i = count($smsInput['sms_list']) - 1; $i >= 0;) { 
			$number += $smsInput['sms_list'][$i]['income'];
			$smsToSend[] += $smsInput['sms_list'][$i]['price'];
			$maxSms -= 1;

			if ($number > $price && $i != 0) {
				$numbersOverPrice[] = $number;
				$number -= $smsInput['sms_list'][$i]['income'];
				array_pop($smsToSend);
				$i--;
			} else if ($number == $price) {
				break;
			} else if ($number != $price && $i == 0) {
				break;
			} else if ($maxSms == 0) {
				$errorMsg = 'Sms limit is too low to pay the price';
				break;
			}
		}
		if ($errorMsg == '') {
			print_r(json_encode($smsToSend));
		} else {
			echo $errorMsg;
		}
	}
}









 ?>