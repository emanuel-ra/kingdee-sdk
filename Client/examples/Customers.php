<?php

require '../vendor/autoload.php';

use KingDee\Client\Customers;

$data = array('PageNo' => 1, 'PageSize' => 2);
$Customers = new Customers();
$response = $Customers->callGetCustomer($data);
if ($response->isSuccess()) {
    echo json_encode($response->getData());
} else {
    echo "Error: " . $response->getErrorMessage();
}
