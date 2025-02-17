<?php

namespace KingDee\Client;

class Branches extends ClientWS
{
    private $soapClient;
    public function __construct()
    {
        parent::__construct();
        $this->soapClient = $this->InitSoap();
    }

    public function callGetBranches($data = array('PageNo' => 1, 'PageSize' => 100))
    {
        try {
            $jsonString = json_encode($data, JSON_PRETTY_PRINT);

            $params = ['FilterJson' => $jsonString];

            $response = $this->soapClient->__soapCall("GetBranches", [$params]);


            //$this->debugSoap();

            // Verificar si la respuesta contiene el resultado esperado
            if (isset($response->GetBranchesResult)) {
                return new ServiceResponse(true, json_decode($response->GetBranchesResult, true));
            }
            return new ServiceResponse(false, null, "No se encontró el resultado esperado.");
            //return isset($response->GetCustomerResult) ? json_decode($response->GetCustomerResult, true) : null;
        } catch (\SoapFault $e) {
            return new ServiceResponse(false, null, $e->getMessage());
        }
    }
}
