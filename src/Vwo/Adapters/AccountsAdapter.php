<?php

namespace GrowthOptimized\Vwo\Adapters;

use GrowthOptimized\Vwo\Collections\CampaignCollection;
use GrowthOptimized\Vwo\Collections\DraftCollection;
use GrowthOptimized\Vwo\Collections\UserCollection;

use GrowthOptimized\Vwo\Items\Account;
use GrowthOptimized\Vwo\Items\Campaign;
use GrowthOptimized\Vwo\Items\Draft;
use GrowthOptimized\Vwo\Items\Threshold;
use GrowthOptimized\Vwo\Items\User;

/**
 * Class AccountsAdapter
 * @package GrowthOptimized
 */
class AccountsAdapter extends AdapterAbstract
{

    /**
     * @return string
     */
    public function all()
    {
        $response = $this->client->get("accounts");

        return Account::createFromJson($response->getBody()->getContents());
    }
    /**
     * @param $accountId
     * @return static
     */
    public function find($accountId = null)
    {
        $this->setAccountId($accountId);

        $response = $this->client->get("accounts/{$this->getAccountId()}");

        return Account::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param $name
     * @param array $attributes
     * @return Project
     */
    public function create($name, array $attributes = [])
    {
        $attributes = array_merge($attributes, compact('name'));

        $response = $this->client->post('accounts', $attributes);

        return Account::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}", $attributes);

        return Account::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return mixed
     */
    public function campaigns()
    {
        return new CampaignsAdapter($this->client, $this->getAccountId());
    }

    /**
     * @return mixed
     */
    public function campaign($campaignId)
    {
        return new CampaignsAdapter($this->client, $this->getAccountId(), $campaignId);
    }

    /**
     * @return mixed
     */
    public function drafts()
    {
        return new DraftsAdapter($this->client, $this->getAccountId());
    }

    /**
     * @return mixed
     */
    public function draft($draftId)
    {
        return new DraftsAdapter($this->client, $this->getAccountId(), null, $draftId);
    }

    /**
     * @return mixed
     */
    public function users()
    {
        return new UsersAdapter($this->client, $this->getAccountId());
    }

    /**
     * @return mixed
     */
    public function user($userId)
    {
        return new UsersAdapter($this->client, $this->getAccountId(), null, $userId);
    }


    /**
     * @return mixed
     */
    public function trackingCode()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/tracking-code");

        return Account::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return mixed
     */
    public function thresholds()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/thresholds");

        return Threshold::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return mixed
     */
    public function updateThreshold(array $attributes = [])
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}/thresholds", $attributes);

        return Threshold::createFromJson($response->getBody()->getContents());
    }

}