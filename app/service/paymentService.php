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

	public function count($requiredIncome, $smsList, $maxMessages)
	{
		$number = 0;
		$result = array();
		$endPoint = count($smsList);

		foreach (array_reverse($smsList) as $key => $value) {
			while ($number < $requiredIncome && $maxMessages != 0) {
				$number += $value['income'];
				$result[] = $value['price'];
				$maxMessages -= 1;
			} if ($number > $requiredIncome && $endPoint != 1) {
				$number -= $value['income'];
				array_pop($result);
				$endPoint -= 1;
				$maxMessages += 1;
			}
		}
		return $result;
	}
}
