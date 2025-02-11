<?php

require '../vendor/autoload.php';

use KingDee\Client\Customers;

$Customers = new Customers();
$result = $Customers->callGetCustomer();
echo json_encode($result);
