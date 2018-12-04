<?php 

namespace App\Service;

class PaymentService
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

	public function count($json)
	{
		$number = 0;
		$result = array();
		$requiredIncome = $json['required_income'];
		$endPoint = count($json['sms_list']);
		$maxMessages = $json['max_messages'];

		foreach (array_reverse($json['sms_list']) as $key => $value) {
			while ($number < $requiredIncome && $maxMessages != 0) {
				$number += $value['price'];
				$result[] = $value['price'];
				$maxMessages -= 1;
			} if ($number > $requiredIncome && $endPoint != 1) {
				$number -= $value['price'];
				array_pop($result);
				$endPoint -= 1;
				$maxMessages += 1;
			}
		}
		return json_encode($result);
	}
}
