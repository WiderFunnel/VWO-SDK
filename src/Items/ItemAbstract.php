<?php

namespace WiderFunnel\Items;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class ItemAbstract
 * @package WiderFunnel\Items
 */
abstract class ItemAbstract implements Arrayable, Jsonable
{
    /**
     * Project constructor.
     * @param $content
     */
    public function __construct(array $content = [])
    {
        foreach ($content as $key => $item) {
            $this->{$key} = $item;
        }
    }

    /**
     * @param $json
     * @return static
     */
    public static function createFromJson($json)
    {
        if (!is_array($json)) {
            $json = json_decode($json, JSON_OBJECT_AS_ARRAY);
        }

        return new static($json);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * @param int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }

}