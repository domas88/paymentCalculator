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

	public function counter($json)
	{
		$smsToSend = array();
		$input = $json;
		$price = $input['required_income'];
		$maxSms = $input['max_messages'];
		$errorMsg = '';
		$number = 0;

		for ($i = count($input['sms_list']) - 1; $i >= 0;) { 
			$number += $input['sms_list'][$i]['income'];
			$smsToSend[] += $input['sms_list'][$i]['price'];
			$maxSms -= 1;

			if ($number > $price && $i != 0) {
				$number -= $input['sms_list'][$i]['income'];
				array_pop($smsToSend);
				$i--;
			} else if ($number == $price) {
				break;
			} else if ($number != $price && $i == 0) {
				break;
			} else if ($maxSms == 0 && $number != $price) {
				$errorMsg = 'Sms limit is too low to pay the price';
				break;
			}
		}
		if ($errorMsg == '') {
			print_r(json_encode($smsToSend));
			print_r(' Paid: ' . $number);
			return json_encode($smsToSend);
		} else {
			echo $errorMsg;
		}
	}
}









 ?>