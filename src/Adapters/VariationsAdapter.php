<?php

namespace WiderFunnel\Adapters;

use WiderFunnel\Items\Variation;

/**
 * Class VariationsAdapter
 * @package WiderFunnel
 */
class VariationsAdapter extends AdapterAbstract
{
    /**
     * @param $variationId
     * @return Variation
     */
    public function find()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations/{$this->getResourceId()}");

        return Variation::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return Variation
     */
    public function update(array $attributes = [])
    {
        var_dump($attributes);
        $response = $this->client->patch("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations/{$this->getResourceId()}", $attributes);

        return Variation::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param $name
     * @return Variation
     */
    public function name($name)
    {
        return $this->update([
            'variations' => compact('name')
        ]);
    }

    /**
     * @param $isControl
     * @return Variation
     */
    public function isControl($isControl)
    {
        return $this->update([
            'variations' => compact('isControl')
        ]);
    }

    /**
     * @param $isDisabled
     * @return Variation
     */
    public function isDisable($isDisabled)
    {
        return $this->update([
            'variations' => compact('isDisabled')
        ]);
    }

    /**
     * @param $percent
     * @return Variation
     */
    public function percentSplit($percentSplit)
    {
        return $this->update([
            'variations' => compact('percentSplit')
        ]);
    }

    /**
     * @param $changes
     * @return Variation
     */
    public function changes($changes)
    {
        return $this->update([
            'variations' => compact('changes')
        ]);
    }

    /**
     * @param $javascript
     * @return Variation
     */
    public function updateJavaScript($javascript)
    {
        return $this->update([
            'variations' => [
                'changes' => "<script>{$javascript}</script>"
            ]
        ]);
    }

    /**
     * @param $css
     * @return Variation
     */
    public function updateCss($css)
    {
        return $this->update([
            'variations' => [
                'changes' => "<style>{$css}</style>"
            ]
        ]);
    }

    /**
     * @return Variation
     */
    public function pause()
    {
        return $this->update(['is_paused' => true]);
    }

    /**
     * @return Variation
     */
    public function resume()
    {
        return $this->update(['is_paused' => false]);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $response = $this->client->delete("accounts/{$this->getAccountId()}/campaigns/{$this->getCampaignId()}/variations/{$this->getResourceId()}");

        return $this->booleanResponse($response);
    }
}