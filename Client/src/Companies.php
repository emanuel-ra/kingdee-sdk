<?php

namespace KingDee\Client;

class Companies extends ClientWS
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
}
