<?php

/**
 * ACCOUNTS:
 */

// Retrieve all accounts
$accounts = $vwo->accounts()->all();


// Retrieve specific account
$account = $vwo->accounts()->find($accountId);


// TODO:
// Create a sub-account
// $vwo->account($accountId)->create(['name' => 'WF Test Account']);


// Update account
$vwo->account($accountId)->update([
	'company' => [
		'name' => "My company name",
		'website' => "https://mywebsitename.com"
	]
]);