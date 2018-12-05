<?php 

require "vendor/autoload.php";
use App\Service\PaymentService as Service;

$service = new Service($argv[1]);
$input = $service->jsonDecode();
$result = $service->count($input['required_income'], $input['sms_list'], $input['max_messages']);
$service->printResult($result);
