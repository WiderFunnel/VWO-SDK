<?php

/**
 * GOALS:
 */

// Get all goals of a campaign
// var_dump($vwo->account($accountId)->campaign($campaignId)->goals()->all());

// Find a goal
// $vwo->account($accountId)->campaign($campaignId)->goal($goalId)->find();

// Create a goal in a project
// $vwo->account($accountId)->campaign($campaignId)->goals()->create([
// 	'goals' => [
// 		'name' => 'New Goal 2',
// 		'type' => 'visitPage',
// 		'urls' => [
// 			array(
// 				'type' => 'url',
// 				'value' => 'http://google.com'
// 			)
// 		]
// 	]
// ]);

// Update a goal
// $vwo->account($accountId)->campaign($campaignId)->goal($goalId)->update([
// 	'goals' => [
// 		'name' => 'Update Goal 2 name'
// 	]
// ]);

// Delete a goal
// $vwo->account($accountId)->campaign($campaignId)->goal($goalId)->delete();