<?php

namespace KingDee\Client;

class ServiceResponse
{
    private $success;
    private $data;
    private $errorMessage;

    public function __construct($success, $data = null, $errorMessage = null)
    {
        $this->success = $success;
        $this->data = $data;
        $this->errorMessage = $errorMessage;
    }

    public function isSuccess()
    {
        return $this->success;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function toArray()
    {
        return [
            'success' => $this->success,
            'data' => $this->data,
            'error' => $this->errorMessage
        ];
    }
}
