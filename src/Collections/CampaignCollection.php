<?php

namespace WiderFunnel\Collections;

use WiderFunnel\Items\Campaign;

/**
 * Class CampaignCollection
 * @package WiderFunnel\Collections
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