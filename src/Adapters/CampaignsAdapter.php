<?php

namespace WiderFunnel\Adapters;

use WiderFunnel\Collections\AudienceCollection;
use WiderFunnel\Collections\DimensionCollection;
use WiderFunnel\Collections\ExperimentCollection;
use WiderFunnel\Collections\GoalCollection;
use WiderFunnel\Collections\CampaignCollection;
use WiderFunnel\Collections\ProjectCollection;
use WiderFunnel\Collections\UploadedListCollection;

use WiderFunnel\Items\Audience;
use WiderFunnel\Items\Dimension;
use WiderFunnel\Items\Experiment;
use WiderFunnel\Items\Goal;
use WiderFunnel\Items\Project;

use WiderFunnel\Items\Campaign;
use WiderFunnel\Items\Variation;

/**
 * Class CampaignsAdapter
 * @package WiderFunnel
 */
class CampaignsAdapter extends AdapterAbstract
{
    /**
     * @return static
     */
    public function find()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}");

        return Campaign::createFromJson($response->getBody()->getContents());
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
     * @param $accountId
     * @param array $attributes
     * @return Campaign
     */
    public function create($accountId, array $attributes = [])
    {
        $this->setAccountId($accountId);
  
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
     * @param $projectId
     * @return mixed
     */
    public function variations()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations");

        return Variation::createFromJson($response->getBody()->getContents());
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
     * @param array $attributes
     * @return static
     */
    public function createVariations(array $attributes = [])
    {
        //$attributes = array_merge($attributes, compact('name', 'description'));

        $response = $this->client->post("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations", $attributes);

        return Variation::createFromJson($response->getBody()->getContents());
    }


    /**
     * @param array $attributes
     * @return static
     */
    public function createGoal(array $attributes = [])
    {
        $response = $this->client->post("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals", $attributes);

        return Goal::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return mixed
     */
    public function goals()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/goals");

        return GoalCollection::createFromJson($response->getBody()->getContents());
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