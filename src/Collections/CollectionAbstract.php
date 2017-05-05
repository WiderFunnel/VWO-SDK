<?php

namespace GrowthOptimized\Collections;

use Illuminate\Support\Collection;

/**
 * Class CollectionAbstract
 * @package GrowthOptimized\Collections
 */
abstract class CollectionAbstract extends Collection
{
    public abstract static function createFromJson($json);
}