<?php

namespace GrowthOptimized;

use GuzzleHttp\ClientInterface;
use GrowthOptimized\Vwo\Adapters\AccountsAdapter;
use GrowthOptimized\Vwo\Adapters\CampaignsAdapter;
use GrowthOptimized\Vwo\Adapters\DraftsAdapter;
use GrowthOptimized\Vwo\Adapters\GoalsAdapter;
use GrowthOptimized\Vwo\Adapters\VariationsAdapter;
use GrowthOptimized\Vwo\Http\Client;

/**
 * Class Vwo
 * @package GrowthOptimized
 */
class Vwo
{
    /**
     * Vwo API endpoint
     */
    const BASE_URI = 'https://app.vwo.com/api/v2/';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Vwo constructor.
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