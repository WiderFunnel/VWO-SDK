<?php

namespace GrowthOptimized\Vwo\Collections;

use GrowthOptimized\Vwo\Items\User;

/**
 * Class UserCollection
 * @package GrowthOptimized\Collections
 */
class UserCollection extends CollectionAbstract
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

        return $collection->transform(function ($user) {
            return new User($user);
        });
    }
}