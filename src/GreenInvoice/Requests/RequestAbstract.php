<?php

namespace GreenInvoice\Requests;

use GreenInvoice\Api;
use GreenInvoice\Constants\ApiMethod;
use GreenInvoice\Interfaces\Arrayable;
use GuzzleHttp\Exception\ClientException;

abstract class RequestAbstract implements Arrayable
{
    private Api $api;

    /**
     * @see ApiMethod
     */
    protected string $api_method;
    protected string $api_endpoint;

    public function _getApiMethod()
    {
        return $this->api_method;
    }

    public function _getApiEndpoint()
    {
        return $this->api_endpoint;
    }

    /**
     * RequestAbstract constructor.
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    protected function _getArrayOfArrayables(array $array, $parentKey = null)
    {
        $arr = [];
        foreach ($array as $key => $item) {
            if (is_array($item)) {
                return $this->_getArrayOfArrayables($item, $key);
            } else if ($item instanceof Arrayable) {
                $arr[$key] = $item->toArray();
            } else {
                $arr[$key] = $item;
            }
        }

        return $arr;
    }

    public function toArray(): array
    {
        $array = [];

        foreach (get_class_methods($this) as $method) {
            if (!preg_match('/^(?<t>get|is)(?<p>[A-Z].+)$/', $method, $m)) {
                continue;
            }

            $prop = lcfirst($m['p']);
            $value = $this->{$method}();

            if ($value === null) {
                continue;
            }

            if ($value instanceof Arrayable) {
                $array[$prop] = $value->toArray();
            } else if (is_array($value)) {
                $array[$prop] = $this->_getArrayOfArrayables($value);
            } else {
                $array[$prop] = $value;
            }
        }

        return $array;
    }

    public function execute()
    {
        return $this->api->execute($this);
    }
}