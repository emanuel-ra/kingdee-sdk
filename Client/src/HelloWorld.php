<?php

namespace KingDee\Client;

class HelloWorld extends ClientWS
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

    public function callHelloWorld()
    {
        try {
            $response = $this->soapClient->HelloWorld();
            return json_decode($response->HelloWorldResult);
        } catch (\SoapFault $e) {
            return 'SOAP Error: ' . $e->getMessage();
        }
    }
}
