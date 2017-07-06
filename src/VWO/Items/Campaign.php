<?php

namespace GrowthOptimized\VWO\Items;

/**
 * Class Campaign
 * @package GrowthOptimized\Items;
 */
class Campaign extends ItemAbstract
{
    // Statuses
    const STATUS_LIVE = 'RUNNING';
    const STATUS_PAUSED = 'PAUSED';
    const STATUS_STOPPED = 'STOPPED';
    const STATUS_NOT_STARTED = 'NOT_STARTED';
    const STATUS_ARCHIVED = 'ARCHIVED';
    const STATUS_TRASHED = 'TRASHED';
    const STATUS_RESTORED = RESTORED';
}