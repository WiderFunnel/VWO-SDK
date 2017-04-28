<?php

/**
 * VARIATIONS:
 */

// Get all variations of a campaign
$vwo->account($accountId)->campaign($campaignId)->variations();

// Get details of a specific campaign variation
$vwo->account($accountId)->campaign($campaignId)->variation($variationId)->find();

$params = [
	'variations' => [
		'name' => 'varE',
		'isControl' => false,
		'changes' => '<script>console.log("wf-test")</script><style>body{background-color:blue}</style>'
	]
];

// Create a campaign variation
$vwo->account($accountId)->campaign($campaignId)->createVariations($params);

// Update a campaign variation
$variation = $vwo->account($accountId)->campaign($campaignId)->variation($variationId)->update([
	'variations' => [
		'name' => 'Var Test'
	]
]);

// Update a campaign variation name
$vwo->account($accountId)->campaign($campaignId)->variation($variationId)->name('Variation DDD');


// Update a campaign variation percentSplit
$vwo->account($accountId)->campaign($campaignId)->variation($variationId)->percentSplit(16.666);

// Update a campaign variation changes (JS/CSS)
$variation = $vwo->account($accountId)->campaign($campaignId)->variation($variationId)->changes('<script>console.log("wf-test")</script><style>body{background-color:blue}</style>');

// Delete a campaign variation
$variation = $vwo->account($accountId)->campaign($campaignId)->variation($variationId)->delete();
