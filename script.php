<?php 

require "vendor/autoload.php";
use App\Service\PaymentService;

$json = new PaymentService($argv[1]);
$input = $json->jsonDecode();
$result = $json->count($input['required_income'], $input['sms_list'], $input['max_messages']);

if (is_array($result)) {
	print_r($result);
} else {
	print_r('Max messages exceeded');
}
