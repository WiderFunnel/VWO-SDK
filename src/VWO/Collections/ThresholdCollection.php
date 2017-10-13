<?php

namespace WiderFunnel\VWO\Collections;

use WiderFunnel\VWO\Items\Threshold;

/**
 * Class ThresholdCollection
 * @package WiderFunnel\Collections
 */
class ThresholdCollection extends CollectionAbstract
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

        return $collection->transform(function ($threshold) {
            return new Threshold($threshold);
        });
    }
}