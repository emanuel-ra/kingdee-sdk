<?php

require '../vendor/autoload.php';

use KingDee\Client\HelloWorld;

$helloWorld = new HelloWorld();
$result = $helloWorld->callHelloWorld();
print_r($result);
