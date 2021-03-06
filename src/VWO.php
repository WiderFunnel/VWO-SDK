<?php

namespace WiderFunnel;

use GuzzleHttp\ClientInterface;
use WiderFunnel\VWO\Adapters\AccountsAdapter;
use WiderFunnel\VWO\Adapters\CampaignsAdapter;
use WiderFunnel\VWO\Adapters\DraftsAdapter;
use WiderFunnel\VWO\Adapters\GoalsAdapter;
use WiderFunnel\VWO\Adapters\VariationsAdapter;
use WiderFunnel\VWO\Http\Client;

/**
 * Class VWO
 * @package WiderFunnel
 */
class VWO
{
    /**
     * VWO API endpoint
     */
    const BASE_URI = 'https://app.vwo.com/api/v2/';

    /**
     * @var Client
     */
    protected $client;

    /**
     * VWO constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $token
     * @param bool $oauth
     * @return static
     */
    public static function create($token, $oauth = true)
    {
        $headers = ['Content-Type' => 'application/json', 'Token' => "{$token}"];

        if(!$oauth) {
            $headers['Token'] = $token;
            unset($headers['Authorization']);
        }

        $client = new Client([
            'base_uri' => self::BASE_URI,
            'headers' => $headers
        ]);

        return new static($client);
    }

    /**
     * @param null $accountId
     * @return $this
     */
    public function account($accountId)
    {
        return new AccountsAdapter($this->client, $accountId);
    }

    /**
     * @return AccountsAdapter
     */
    public function accounts()
    {
        return new AccountsAdapter($this->client);
    }

    /**
     * @param null $campaignId
     * @return $this
     */
    public function campaign($campaignId)
    {
        return new CampaignsAdapter($this->client, $campaignId);
    }

    /**
     * @return CampaignsAdapter
     */
    public function campaigns()
    {
        return new CampaignsAdapter($this->client);
    }

    /**
     * @param $variationId
     * @return VariationsAdapter
     */
    public function variation($variationId)
    {
        return new VariationsAdapter($this->client, $variationId);
    }

    /**
     * @return string
     */
    public function variations()
    {
        return new VariationsAdapter($this->client);
    }

    // /**
    //  * @param $goalId
    //  * @return GoalsAdapter
    //  */
    // public function goal($goalId)
    // {
    //     return new GoalsAdapter($this->client, $goalId);
    // }

    // /**
    //  * @return string
    //  */
    // public function goals()
    // {
    //     return new GoalsAdapter($this->client);
    // }

}