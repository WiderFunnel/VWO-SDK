<?php

use Dotenv\Dotenv;
use WiderFunnel\VWO;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

$token = getenv('VWO_TOKEN');

$accountId = 209707; //central
$campaignId = 158;
$variationId = 6;
$goalId = 2;
$draftId = 1661344;
$userId = 373790;

$vwo = VWO::create($token);

// include __DIR__ . '/includes/accounts.php';
// include __DIR__ . '/includes/campaigns.php';
include __DIR__ . '/includes/variations.php';
// include __DIR__ . '/includes/goals.php';
// include __DIR__ . '/includes/drafts.php';
// include __DIR__ . '/includes/users.php';
// include __DIR__ . '/includes/trackingCode.php';
// include __DIR__ . '/includes/thresholds.php';
