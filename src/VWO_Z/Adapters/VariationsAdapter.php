<?php

namespace GrowthOptimized\VWO\Adapters;

use GrowthOptimized\VWO\Items\Variation;

/**
 * Class VariationsAdapter
 * @package GrowthOptimized
 */
class VariationsAdapter extends AdapterAbstract
{


    /**
     * @return Variation
     */
    public function all()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations");

        return Variation::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return Variation
     */
    public function find()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations/{$this->getResourceId()}");

        return Variation::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = [])
    {

        $response = $this->client->post("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations", $attributes);

        return Variation::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return Variation
     */
    public function update(array $attributes = [])
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations/{$this->getResourceId()}", $attributes);

        return Variation::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $response = $this->client->delete("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations/{$this->getResourceId()}");

        return $this->booleanResponse($response);
    }

    /**
     * @param $name
     * @return static
     */
    public function name($name)
    {
        return $this->update([
            'variations' => compact('name')
        ]);
    }

    /**
     * @param $isControl
     * @return static
     */
    public function isControl($isControl)
    {
        return $this->update([
            'variations' => compact('isControl')
        ]);
    }

    /**
     * @param $isDisabled
     * @return static
     */
    public function isDisable($isDisabled)
    {
        return $this->update([
            'variations' => compact('isDisabled')
        ]);
    }

    /**
     * @param $percent
     * @return static
     */
    public function percentSplit($percentSplit)
    {
        return $this->update([
            'variations' => compact('percentSplit')
        ]);
    }

    /**
     * @param $changes
     * @return static
     */
    public function changes($changes)
    {
        return $this->update([
            'variations' => compact('changes')
        ]);
    }

    /**
     * @return static
     */
    public function pause()
    {
        return $this->update(['is_paused' => true]);
    }

    /**
     * @return static
     */
    public function resume()
    {
        return $this->update(['is_paused' => false]);
    }

}