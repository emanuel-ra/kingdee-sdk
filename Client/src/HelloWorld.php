<?php

namespace KingDee\Client;

class HelloWorld extends ClientWS
{
    private $soapClient;

    public function __construct()
    {
        parent::__construct();
        $this->soapClient = $this->InitSoap();
    }
    public function callHelloWorld()
    {
        try {

            $params = [];
            $response = $this->soapClient->__soapCall("HelloWorld", [$params]);

            // 🛠 Llamar a la función de depuración después de la llamada SOAP
            //$this->debugSoap();

            // Verificar si la respuesta contiene el resultado esperado
            return isset($response->HelloWorldResult) ? json_decode($response->HelloWorldResult, true) : null;
        } catch (\SoapFault $e) {
            $this->debugSoap(); // Muestra la solicitud y respuesta en caso de error
            throw new \Exception('SOAP Error: ' . $e->getMessage());
        }
    }
}
