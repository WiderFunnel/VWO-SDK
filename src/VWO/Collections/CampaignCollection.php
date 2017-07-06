<?php

namespace GrowthOptimized\VWO\Collections;

use GrowthOptimized\VWO\Items\Campaign;

/**
 * Class CampaignCollection
 * @package GrowthOptimized\Collections
 */
class CampaignCollection extends CollectionAbstract
{
    /**
     * @param $json
     * @return mixed
     */
    public static function createFromJson($json)
    {
        if (!is_array($json)) {
            $json = json_decode($json, JSON_OBJECT_AS_ARRAY);
        }
     
        $collection = new static($json);

        return $collection->transform(function ($campaign) {
            return new Campaign($campaign);
        });
    }
}