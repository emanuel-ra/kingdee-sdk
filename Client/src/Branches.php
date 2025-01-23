<?php

namespace KingDee\Client;

class Branch extends ClientWS
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

    public function getBranches()
    {
        return "OK";
    }

    public function getBranch($id)
    {
        return "OK";
    }
    public function Create($id)
    {
        return "OK";
    }
    public function Update($id)
    {
        return "OK";
    }
}
