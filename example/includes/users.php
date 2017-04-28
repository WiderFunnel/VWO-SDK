<?php

/**
 * USERS:
 */

// Get all users
$vwo->account($accountId)->users();

// Get user details
$vwo->account($accountId)->user($userId)->find();

// Create a user
$vwo->account($accountId)->createUser([
  'name' => 'Test via API',
  'email' => 'vwo_test_api@mywebsitename.com',
  'password' => '1234asdf',
  'confirmPassword' => '1234asdf',
  'phone' => '9999988877',
  'country' => 'CA',
  'department' => 'Directory of Technology',
  'title' => 'API Evangelist',
  'permission' => 'Admin'
]);

// Update user details
$vwo->account($accountId)->user($userId)->update([
	'name' => 'Test Tester API',
	'phone' => '1234567890'
]);

// Delete a user
$vwo->account($accountId)->user($userId)->delete();
