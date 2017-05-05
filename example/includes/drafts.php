<?php

/**
 * DRAFTS:
 */

// Get all drafts campaigns
$drafts = $vwo->account($accountId)->drafts()->all();

// Get specific draft campaign
$draft = $vwo->account($accountId)->draft($draftId)->find();

// TODO: Update draft campaigns
// $draft = $vwo->account($accountId)->draft($draftId)->update([
// 		'primaryUrl' => 'http://google.com'
// ]);

// Delete a campaign draft
$vwo->account($accountId)->draft($draftId)->delete();
