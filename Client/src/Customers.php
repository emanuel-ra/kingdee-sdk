<?php

namespace KingDee\Client;

class Customers extends ClientWS
{
    private $soapClient;
    private $wsdl;
    public function __construct()
    {
        parent::__construct();
        $this->wsdl = $this->getApiUrl();
        if ($this->wsdl !== null) {
            $this->soapClient = new \SoapClient($this->wsdl);
        } else {
            throw new \Exception('API URL is not set in the configuration.');
        }
    }
    public function callGetCustomer()
    {
        try {
            $response = $this->soapClient->GetCustomer();
            return json_decode($response->GetCustomerResult);
        } catch (\SoapFault $e) {
            return 'SOAP Error: ' . $e->getMessage();
        }
    }
}
