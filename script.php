<?php 

require "vendor/autoload.php";
use App\Service\PaymentService;

$json = new PaymentService($argv[1]);
$input = $json->jsonDecode();

$result = $json->count($input['required_income'], $input['sms_list'], $input['max_messages']);
// print_r($result);
print_r($input['required_income']);
print_r($input['sms_list']);
print_r($input['max_messages']);
