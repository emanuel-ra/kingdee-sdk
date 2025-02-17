<?php

require '../vendor/autoload.php';

use KingDee\Client\Branches;

$data = array('PageNo' => 1, 'PageSize' => 2);
$Branches = new Branches();
$response = $Branches->callGetBranches($data);
if ($response->isSuccess()) {
    echo json_encode($response->getData());
} else {
    echo "Error: " . $response->getErrorMessage();
}
