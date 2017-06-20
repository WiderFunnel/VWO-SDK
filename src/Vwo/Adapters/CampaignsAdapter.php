<?php

namespace GrowthOptimized\Vwo\Adapters;

use GrowthOptimized\Vwo\Collections\GoalCollection;
use GrowthOptimized\Vwo\Collections\CampaignCollection;

use GrowthOptimized\Vwo\Items\Goal;
use GrowthOptimized\Vwo\Items\Campaign;
use GrowthOptimized\Vwo\Items\Variation;

/**
 * Class CampaignsAdapter
 * @package WiderFunnel
 */
class CampaignsAdapter extends AdapterAbstract
{

    /**
     * @return static
     */
    public function all()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns");

        return CampaignCollection::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return static
     */
    public function find()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}");

        return Campaign::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param $accountId
     * @param array $attributes
     * @return Campaign
     */
    public function create(array $attributes = [])
    {
  
        //$attributes = array_merge($attributes, compact('type', 'name'));
        
        $response = $this->client->post("accounts/{$this->getAccountId()}/campaigns", $attributes);

        return Campaign::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}", $attributes);

        return Campaign::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function updateStatus(array $attributes)
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}/campaigns/status", $attributes);

        return Campaign::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return CampaignsAdapter
     */
    public function launch()
    {
        return $this->updateStatus([
            'ids' => [$this->getCampaignId()],
            'status' => Campaign::STATUS_RUNNING
        ]);
    }

    /**
     * @return CampaignsAdapter
     */
    public function pause()
    {
        return $this->updateStatus([
            'ids' => [$this->getCampaignId()],
            'status' => Campaign::STATUS_PAUSED
        ]);
    }

    /**
     * @return CampaignsAdapter
     */
    public function stop()
    {
        return $this->updateStatus([
            'ids' => [$this->getCampaignId()],
            'status' => Campaign::STATUS_STOPPED
        ]);
    }

    /**
     * @return CampaignsAdapter
     */
    public function restore()
    {
        $this->setAccountId($accountId);
        return $this->updateStatus([
            'ids' => [$this->getCampaignId()],
            'status' => Campaign::STATUS_RESTORED
        ]);
    }

    /**
     * @return CampaignsAdapter
     */
    public function trash()
    {
        return $this->updateStatus([
            'ids' => [$this->getCampaignId()],
            'status' => Campaign::STATUS_TRASHED
        ]);
    }

    /**
     * @return static
     */
    public function shareLink()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/share");

        return Campaign::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return mixed
     */
    public function variations()
    {
        return new VariationsAdapter($this->client, $this->getAccountId(), $this->getCampaignId());
    }

    /**
     * @return mixed
     */
    public function variation($variationId)
    {
        $this->setResourceId($variationId);
        return new VariationsAdapter($this->client, $this->getAccountId(), $this->getCampaignId(), $variationId);
    }


    /**
     * @return mixed
     */
    public function goals()
    {
        return new GoalsAdapter($this->client, $this->getAccountId(), $this->getCampaignId());
    }

    /**
     * @return mixed
     */
    public function goal($goalId)
    {
        $this->setResourceId($goalId);
        return new GoalsAdapter($this->client, $this->getAccountId(), $this->getCampaignId(), $goalId);
    }

}