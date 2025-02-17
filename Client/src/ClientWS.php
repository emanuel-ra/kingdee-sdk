<?php

namespace KingDee\Client;

use Dotenv\Dotenv;

/**
 * Class ClientWS
 *
 * This class is responsible for loading configuration from the .env file
 * and providing access to the API key and API URL.
 *
 * @package KingDee\Client
 */
class ClientWS
{
    /**
     * @var array Configuration array containing API key and API URL.
     */
    private $config;
    private $soapClient;
    private $wsdl;
    /**
     * * ClientWS constructor.
     *
     * Loads the environment variables from the .env file and sets the configuration.
     */
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->config = [
            'api_id' => $_ENV['API_ID'] ?? null,
            'api_secret' => $_ENV['APP_SECRET'] ?? null,
            'api_url' => $_ENV['API_URL'] ?? null,
            'namespace' => 'http://tempuri.org/'
        ];
    }

    public function InitSoap()
    {
        $WSDL = $this->getApiUrl();
        $API_ID = $this->getApiId();
        $API_SECRET = $this->getApiSecret();
        $NAMESPACE = $this->getNamespace();
        if ($WSDL !== null) {
            try {
                $this->soapClient = new \SoapClient($WSDL, [
                    'trace' => 1,   // Enable tracing for debugging
                    'exceptions' => true // Throw exceptions on SOAP errors
                ]);

                $headers = array(
                    'AppID' => $API_ID,
                    'AppSecret' => $API_SECRET
                );


                $soapHeader = new \SoapHeader($NAMESPACE, 'MySoapHeader', $headers, false);

                // Asignar el header al cliente SOAP
                $this->soapClient->__setSoapHeaders($soapHeader);

                return $this->soapClient;
            } catch (\SoapFault $e) {
                throw new \Exception('SOAP Client Error: ' . $e->getMessage());
            }
        } else {
            throw new \Exception('API URL is not set in the configuration.');
        }
    }

    /**
     * Get the configuration array.
     *
     * @return array Configuration array containing API key and API URL.
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get the API URL from the configuration.
     *
     * @return string|null API URL or null if not set.
     */
    public function getApiUrl()
    {
        return $this->config['api_url'];
    }
    public function getApiId()
    {
        return $this->config['api_id'];
    }
    public function getApiSecret()
    {
        return $this->config['api_secret'];
    }
    public function getNamespace()
    {
        return $this->config['namespace'];
    }

    /**
     * 🔍 Método para depurar la solicitud y respuesta SOAP
     */
    public function debugSoapRequest()
    {
        if ($this->soapClient) {
            header("Content-Type: text/xml");
            //echo "<br> ==== FORMATTED SOAP REQUEST ==== <br>";
            //echo $this->formatXml($this->soapClient->__getLastRequest()); // XML formateado            

            // echo "<br> ==== FORMATTED SOAP RESPONSE ==== <br>";
            echo $this->formatXml($this->soapClient->__getLastResponse()); // XML formateado
            exit;
        }
    }
    public function debugSoapResponse()
    {
        if ($this->soapClient) {
            header("Content-Type: text/xml");
            echo $this->formatXml($this->soapClient->__getLastResponse()); // XML formateado
            exit;
        }
    }

    /**
     * 📌 Formatear XML para que sea más legible
     */
    public function formatXml($xml)
    {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);
        return $dom->saveXML();
    }
}
