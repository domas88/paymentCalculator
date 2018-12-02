<?php 

namespace App\Service;

/**
 * 
 */
class paymentService
{
	public $jsonStr;
	
	function __construct($arg)
	{
		$this->jsonStr = $arg;
	}

	function jsonFiles() 
	{
		$json = file_get_contents($this->jsonStr);
		$jsonDecoded = json_decode($json, true);

		return $jsonDecoded;
	}

	function smsList() 
	{
		$smsList = array();
		$json = $this->jsonFiles();

		for ($i=0; $i < count($json['sms_list']); $i++) { 
			$smsList[] = $json['sms_list'][$i];
		}
		$smsList += array('required_income' => $json['required_income']);
		return $smsList;
	}

	function counter()
	{
		$smsToSend = array();
		$numbersOverPrice = array();
		$smsList = $this->smsList();
		$price = $smsList['required_income'];
		$number = 0;
		$maxSms = 3;

		for ($i=3; $i >= 0;) { 
			$number += $smsList[$i]['price'];
			$smsToSend[] += $smsList[$i]['price'];
			$maxSms -= 1;

			if ($number > $price && $i != 0) {
				$numbersOverPrice[] = $number;
				$number -= $smsList[$i]['price'];
				array_pop($smsToSend);
				$i--;
			} else if ($number == $price) {
				break;
			} else if ($number != $price && $i == 0 && $number < $price) {
				$smsToSend[] += min($numbersOverPrice[]);
				break;
			} else if ($maxSms == 0) {
				echo "error";
				break;
			}
		}
		print_r(json_encode($smsToSend));
	}
}









 ?>