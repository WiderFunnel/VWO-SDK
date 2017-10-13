<?php

namespace WiderFunnel\VWO\Http;

use GuzzleHttp\Client as BaseClient;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\ClientException;

/**
 * Class HttpClient
 * @package WiderFunnel
 */
class Client extends BaseClient
{
    /**
     * @param $endpoint
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($endpoint)
    {
        return $this->call('GET', $endpoint);
    }

    /**
     * @param $endpoint
     * @param $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($endpoint, $options)
    {   
        return $this->call('POST', $endpoint, $options);
    }

    /**
     * @param $endpoint
     * @param $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function patch($endpoint, array $options = [])
    {
        return $this->call('PATCH', $endpoint, $options);
    }

    /**
     * @param $endpoint
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($endpoint)
    {
        return $this->call('DELETE', $endpoint);
    }


    /**
     * @param $endpoint, $method, $options
     *
    */
    public function call($method, $endpoint, array $options = [])
    {
        try {
            return $this->request($method, $endpoint, ['body' => json_encode($options)]);
        } catch(ClientException $exception) {
            return $exception->getResponse();            
        }

    }

}