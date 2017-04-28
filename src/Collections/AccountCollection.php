<?php

namespace WiderFunnel\Collections;

use WiderFunnel\Items\Account;

/**
 * Class AccountCollection
 * @package WiderFunnel\Collections
 */
class AccountCollection extends CollectionAbstract
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

        return $collection->transform(function ($account) {
            return new Account($account);
        });
    }
}