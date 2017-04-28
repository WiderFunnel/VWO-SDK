<?php

/**
 * THRESHOLDS:
 */

// Get account thresholds
$vwo->account($accountId)->thresholds();

// Update account thresholds
$vwo->account($accountId)->updateThreshold([
	'visitors' => 25
]);
