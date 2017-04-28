<?php

namespace WiderFunnel\Items;

/**
 * Class Goal
 * @package WiderFunnel\Items;
 */
class Goal extends ItemAbstract
{
    // Goals types
    const TYPE_CLICK = 0;
    const TYPE_CUSTOM_EVENT = 1;
    const TYPE_ENGAGEMENT = 2;
    const TYPE_PAGEVIEWS = 3;
    const TYPE_REVENUE = 4;

    // URL Match Types
    const MATCH_EXACT = 0;
    const MATCH_REGEX = 1;
    const MATCH_SIMPLE = 2;
    const MATCH_SUBSTRING = 3;
}