<?php

namespace WiderFunnel\Adapters;

use WiderFunnel\Items\Goal;

/**
 * Class GoalsAdapter
 * @package WiderFunnel
 */
class GoalsAdapter extends AdapterAbstract
{
    /**
     * @param $goalId
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