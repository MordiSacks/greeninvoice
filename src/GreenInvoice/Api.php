<?php

namespace GreenInvoice;

use GreenInvoice\Requests\RequestAbstract;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class Api
 *
 * @property-read  Declarations\Documents $documents
 *
 * @package GreenInvoice
 */
class Api
{
    private string $api_key;
    private string $api_secret;
    private ?string $token = null;
    private string $url;

    /**
     * Api constructor.
     *
     * @param string      $url
     * @param string      $api_key
     * @param string      $api_secret
     * @param string|null $token
     */
    public function __construct(string $url, string $api_key, string $api_secret, ?string $token = null)
    {
        $this->url = $url;
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
        $this->token = $token;
    }

    public function getClient()
    {
        return new Client([
            'base_uri' => $this->url,
            'headers'  => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);
    }

    public function refreshToken()
    {
        try {
            $response = $this->getClient()->post('account/token', [
                'body' => json_encode([
                    'id'     => $this->api_key,
                    'secret' => $this->api_secret,
                ]),
            ]);

        } catch (ClientException $e) {
            dump(json_decode($e->getResponse()->getBody()->getContents(), true));
            throw $e;
        }

        $response = json_decode($response->getBody()->getContents(), true);
        $this->token = $response['token'];
    }

    public function __get($name)
    {
        if (!in_array($name, ['documents'])) {
            trigger_error("Property $name doesn't exists and cannot be get.", E_USER_ERROR);
        }

        $fqcn = '\GreenInvoice\Declarations\\' . ucfirst($name);

        return new $fqcn($this);
    }

    public function execute(RequestAbstract $request, int $attempt = 0)
    {
        $requestBody = static::dropNullsRecursive($request->toArray());

        try {
            $response = $this
                ->getClient()
                ->request($request->_getApiMethod(), $request->_getApiEndpoint(), [
                    'body' => json_encode($requestBody),
                ]);
        } catch (ClientException $e) {
            if ($e->getCode() === 401) {
                $this->refreshToken();

                if ($attempt > 3) {
                    dd('to many Attempts');
                }

                return $this->execute($request, $attempt++);
            }

            dd(json_decode($e->getResponse()->getBody()->getContents()), $requestBody, json_encode($requestBody));
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }

        dd(json_decode($response->getBody()->getContents(), true));
    }

    private static function dropNullsRecursive(array $array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = static::dropNullsRecursive($array[$key]);
            }

            if ($array[$key] === null) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}