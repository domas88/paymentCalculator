<?php 

require "vendor/autoload.php";
use App\Service\paymentService;

$json = new paymentService($argv[1]);
$json->counter();
// print_r($json->incomeSmsList());















 ?>