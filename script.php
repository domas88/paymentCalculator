<?php 

require "vendor/autoload.php";
use App\Service\PaymentService;

$json = new PaymentService($argv[1]);

print_r($json->count($json->jsonDecode()));
