<?php

namespace KingDee\Client;

use Dotenv\Dotenv;

class ClientWS
{
    private $config;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->config = [
            'api_key' => $_ENV['API_KEY'] ?? null,
            'api_url' => $_ENV['API_URL'] ?? null,
        ];
    }

    public function getConfig()
    {
        return $this->config;
    }
    public function getApiUrl()
    {
        return $this->config['api_url'];
    }
}
