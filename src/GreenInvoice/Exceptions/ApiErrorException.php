<?php

namespace GreenInvoice\Exceptions;

use GuzzleHttp\Exception\ClientException;
use Throwable;

class ApiErrorException extends \Exception
{
    private ClientException $clientException;

    public function __construct(ClientException $clientException, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->clientException = $clientException;
        parent::__construct($message, $code, $previous);
    }


    public function getClientException()
    {
        return $this->clientException;
    }
}