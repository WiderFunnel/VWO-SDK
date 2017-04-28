<?php

namespace WiderFunnel\Adapters;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AdapterAbstract
 * @package WiderFunnel\Adapters
 */
class AdapterAbstract
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $accountId;

    /**
     * @var
     */
    protected $campaignId; 

    /**
     * Optimizely constructor.
     * @param ClientInterface $client
     * @param null $id
     */
    public function __construct(ClientInterface $client, $accountId = null, $campaignId = null, $id = null)
    {
        $this->client = $client;
        $this->accountId = $accountId;
        $this->campaignId = $campaignId;
        $this->id = $id;
    }

    /**
     * @param $resourceId
     */
    protected function setResourceId($resourceId = null)
    {
        if (!is_null($resourceId)) {
            $this->id = $resourceId;
        }
    }

    /**
     * @param $accountId
     */
    protected function setAccountId($accountId = null)
    {
        if (!is_null($accountId)) {
            $this->accountId = $accountId;
        }
    }
    
    /**
     * @param $campaignId
     */
    protected function setCampaignId($campaignId = null)
    {
        if (!is_null($campaignId)) {
            $this->campaignId = $campaignId;
        }
    }

    /**
     * @return null
     */
    protected function getResourceId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    protected function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @return null
     */
    protected function getCampaignId()
    {
        return $this->campaignId;
    }


    /**
     * @param $time
     * @return string
     */
    protected function normalizeDate($time)
    {
        if (is_a($time, 'Carbon\\Carbon')) {
            return $time->format('Y-m-d\TH:i:s\Z');
        }

        return $time;
    }

    /**
     * @param ResponseInterface $response
     * @return bool
     */
    protected function booleanResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 204) {
            return false;
        }

        return true;
    }
}