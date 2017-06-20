<?php

/**
 * CAMPAIGNS:
 */

// Get all campaigns in an account / sub-account
// var_dump($vwo->account($accountId)->campaigns()->all()['_data']);


// Get details of a specific campaign
// $vwo->account($accountId)->campaign($campaignId)->find();


// Get share link for a specific campaign
// $vwo->account($accountId)->campaign($campaignId)->shareLink();

// Create a campaign
$params = [
    'type' => 'ab',
    'name' => 'WF Test April 26',
    'urls' => [
        array(
        	'type' => 'url',
        	'value' => 'https://widerfunnel.com'
        )
    ],
	'primaryUrl' => 'https://widerfunnel.com',
	'goals' => [
		array(
			'name' => 'New goal',
			'type' => 'visitPage',
			'urls' => [  
				array(
					'type' => 'url',
					'value' => 'https://widerfunnel.com'
				)
			]
		)
	],

	'variations' => [
		array(
			'name' => 'default',
			'isControl' => false,
			'percentSplit' => 0
		), 
		array(
			'name' => 'control',
			'isControl' => true
		),
		array(
			'name' => 'varA',
			'isControl' => false
		)
	]

];

var_dump($vwo->account($accountId)->campaigns()->create($params));

// Update a campaign
// $vwo->account($accountId)->campaign($campaignId)->update([
// 	'campaigns' => [
//     	'name' => 'New name'
// 	]
// ]);

// Launch a campaign
// $vwo->account($accountId)->campaign($campaignId)->launch();

// Pause a campaign
// $vwo->account($accountId)->campaign($campaignId)->pause();

// Stop a campaign
// $vwo->account($accountId)->campaign($campaignId)->stop();

// Restore a campaign
// $vwo->account($accountId)->campaign($campaignId)->restore();

// Trash a campaign
// $vwo->account($accountId)->campaign($campaignId)->trash();