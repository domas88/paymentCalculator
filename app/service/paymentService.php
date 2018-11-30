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

	function incomeSmsList() 
	{
		$smsList = array();
		$json = $this->jsonFiles();

		for ($i=0; $i < count($json['sms_list']); $i++) { 
			$smsList[] = $json['sms_list'][$i];
		}
		return $smsList;
	}

	function counter()
	{
		$price = 12.1;
		$smsToSend = array();
		$finalArray = array();
		$smsArray = $this->incomeSmsList();
		$number = 0;
		$key = 3;

		while ($number < $price && $key >= 0) {
			$number += $smsArray[$key]['price'];
			$smsToSend[] += $smsArray[$key]['price'];
			
			if ($number > $price && $key != 0) {
				$finalArray[] = $number;
				$number -= $smsArray[$key]['price'];
				array_pop($smsToSend);
				$key -= 1;
			} else if ($number == $price) {
				break;
			} else if ($number != $price && $key == 0 && $number < $price) {
				$smsToSend[] += min($finalArray[]);
			}
		}
		print_r($smsToSend);
	}
}









 ?>