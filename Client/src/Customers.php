<?php

namespace KingDee\Client;

class Customers extends ClientWS
{
    private $soapClient;
    public function __construct()
    {
        parent::__construct();
        $this->soapClient = $this->InitSoap();
    }
    public function callGetCustomer($data = array('PageNo' => 1, 'PageSize' => 100))
    {
        try {
            $jsonString = json_encode($data, JSON_PRETTY_PRINT);

            $params = [
                'FilterJson' => $jsonString,
            ];

            $response = $this->soapClient->__soapCall("GetCustomer", [$params]);
            return isset($response->GetCustomerResult) ? json_decode($response->GetCustomerResult, true) : null;
        } catch (\SoapFault $e) {
            return 'SOAP Error: ' . $e->getMessage();
        }
    }
}
