<?php

namespace WiderFunnel\VWO\Collections;

use WiderFunnel\VWO\Items\Draft;

/**
 * Class DraftCollection
 * @package WiderFunnel\Collections
 */
class DraftCollection extends CollectionAbstract
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

        return $collection->transform(function ($draft) {
            return new Draft($draft);
        });
    }
}