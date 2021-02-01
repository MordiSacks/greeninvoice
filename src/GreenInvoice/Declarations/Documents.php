<?php

namespace GreenInvoice\Declarations;

use GreenInvoice\Api;
use GreenInvoice\Exceptions\RequestDoesNotExistException;
use GreenInvoice\Requests\Documents\AddDocument;

/**
 * Class Documents
 * @method AddDocument addDocument()
 *
 * @package GreenInvoice\Declarations
 */
class Documents
{
    private Api $api;

    /**
     * Documents constructor.
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __call($name, $arguments)
    {
        $fqcn = '\\GreenInvoice\\Requests\\Documents\\' . ucfirst($name);

        if (!class_exists($fqcn)) {
            throw new RequestDoesNotExistException('Request "' . $name . '" does not exist!');
        }

        return new $fqcn($this->api, ...$arguments);
    }
}