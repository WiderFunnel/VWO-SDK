<?php

namespace GrowthOptimized\Http;

use GuzzleHttp\Client as BaseClient;

/**
 * Class HttpClient
 * @package GrowthOptimized
 */
class Client extends BaseClient
{
    /**
     * @param $endpoint
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($endpoint)
    {
        return $this->request('GET', $endpoint);
    }

    /**
     * @param $endpoint
     * @param $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($endpoint, $options)
    {
        return $this->request('POST', $endpoint, ['body' => json_encode($options)]);
    }

    /**
     * @param $endpoint
     * @param $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function put($endpoint, $options)
    {
        return $this->request('PUT', $endpoint, ['body' => json_encode($options)]);
    }

    /**
     * @param $endpoint
     * @param $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function patch($endpoint, $options)
    {
        return $this->request('PATCH', $endpoint, ['body' => json_encode($options)]);
    }


    /**
     * @param $endpoint
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($endpoint)
    {
        return $this->request('DELETE', $endpoint);
    }
}