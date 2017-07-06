<?php

namespace GrowthOptimized\VWO\Adapters;

use GrowthOptimized\VWO\Items\Goal;

/**
 * Class GoalsAdapter
 * @package GrowthOptimized
 */
class GoalsAdapter extends AdapterAbstract
{

    /**
     * @return static
     */
    public function all()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals");

        return Goal::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return static
     */
    public function find()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals/{$this->getResourceId()}");

        return Goal::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = [])
    {
        $response = $this->client->post("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals", $attributes);

        return Goal::createFromJson($response->getBody()->getContents());
    }


    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals/{$this->getResourceId()}", $attributes);

        return Goal::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return static
     */
    public function delete()
    {
        $response = $this->client->delete("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals/{$this->getResourceId()}");

        return $this->booleanResponse($response);
    }
}