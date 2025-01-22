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
            'api_key' => $_ENV['API_KEY'] ?? null,
            'api_url' => $_ENV['API_URL'] ?? null,
        ];
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
}
