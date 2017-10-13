# VWO PHP SDK
[![Packagist](https://img.shields.io/packagist/v/WiderFunnel/Vwo-SDK.svg?maxAge=2592000?style=flat-square)](https://packagist.org/packages/widerfunnel/vwo-sdk)
[![Travis](https://img.shields.io/travis/WiderFunnel/Vwo-SDK/master.svg?maxAge=2592000?style=flat-square)](https://travis-ci.org/widerfunnel/VWO-SDK)

PHP Wrapper to interact with the VWO API.

## Installation

```bash
composer require WiderFunnel/vwo-sdk
```

## Usage

Simply create an VWO object, with a valid OAuth Token in the constructor: 

```php
$vwo = Vwo::create($token);
```

### Accounts

```php
// Read all accounts
$vwo->accounts()->all();

// Read account
$vwo->account($accountId)->find();

// Create a sub-account
$vwo->account($accountId)->create(['name' => 'My new Account']);

// Update account
$vwo->account($accountId)->update([
    'company' => [
        'name' => "My company name",
        'website' => "https://mywebsitename.com"
    ]
]);


### Campaigns

```php
// Get all campaigns in an account / sub-account
$vwo->account($accountId)->campaigns()->all();

// Get details of a specific campaign
$vwo->account($accountId)->campaign($campaignId)->find();

// Get share link for a specific campaign
$vwo->account($accountId)->campaign($campaignId)->shareLink();

// Create a campaign
$params = [
    'type' => 'ab',
    'name' => 'My new campaign',
    'urls' => [
        array(
            'type' => 'url',
            'value' => 'https://mywebsitename.com'
        )
    ],
    'primaryUrl' => 'https://mywebsitename.com',
    'goals' => [
        array(
            'name' => 'New goal',
            'type' => 'visitPage',
            'urls' => [  
                array(
                    'type' => 'url',
                    'value' => 'https://mywebsitename.com'
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
            'name' => 'VarA',
            'isControl' => true
        ),
        array(
            'name' => 'VarB',
            'isControl' => false
        )
    ]

];
$vwo->account($accountId)->campaigns()->create($params);

// Update a campaign
$vwo->account($accountId)->campaign($campaignId)->update([
    'campaigns' => [
        'name' => 'New name'
    ]
]);

// Update campaign status
$vwo->account($accountId)->campaign($campaignId)->update([
    'ids' => [14,15],
    'status' => 'TRASHED'
]);

// Launch a campaign
$vwo->account($accountId)->campaign($campaignId)->launch();

// Pause a campaign
$vwo->account($accountId)->campaign($campaignId)->pause();

// Stop a campaign
$vwo->account($accountId)->campaign($campaignId)->stop();

// Restore a campaign
$vwo->account($accountId)->campaign($campaignId)->restore();

// Trash a campaign
$vwo->account($accountId)->campaign($campaignId)->trash();
```

### Variations

```php
// Get all variations of a campaign
$vwo->account($accountId)->campaign($campaignId)->variations()->all();

// Get details of a specific campaign variation
$vwo->account($accountId)->campaign($campaignId)->variation($variationId)->find();

$params = [
    'variations' => [
        'name' => 'varE',
        'isControl' => false,
        'changes' => '<script>console.log("hello world")</script><style>body{background-color:blue}</style>'
    ]
];

// Create a campaign variation
$vwo->account($accountId)->campaign($campaignId)->variations()->create($params);

// Update a campaign variation
$variation = $vwo->account($accountId)->campaign($campaignId)->variation($variationId)->update([
    'variations' => [
        'name' => 'My new variation'
    ]
]);

// Update a campaign variation name
$vwo->account($accountId)->campaign($campaignId)->variation($variationId)->name('Variation DDD');

// Update a campaign variation percentSplit
$vwo->account($accountId)->campaign($campaignId)->variation($variationId)->percentSplit(16.666);

// Update a campaign variation changes (JS/CSS)
$variation = $vwo->account($accountId)->campaign($campaignId)->variation($variationId)->changes('<script>console.log("hello world")</script><style>body{background-color:blue}</style>');

// Delete a campaign variation
$variation = $vwo->account($accountId)->campaign($campaignId)->variation($variationId)->delete();
```

### Goals

```php
// Get all goals of a campaign
$vwo->account($accountId)->campaign($campaignId)->goals()->all();

// Find a goal
$vwo->account($accountId)->campaign($campaignId)->goal($goalId)->find();

// Create a goal in a project
$vwo->account($accountId)->campaign($campaignId)->goals()->create([
    'goals' => [
        'name' => 'New Goal 2',
        'type' => 'visitPage',
        'urls' => [
            array(
                'type' => 'url',
                'value' => 'http://google.com'
            )
        ]
    ]
]);

// Update a goal
$vwo->account($accountId)->campaign($campaignId)->goal($goalId)->update([
    'goals' => [
        'name' => 'Update Goal 2 name'
    ]
]);

// Delete a goal
$vwo->account($accountId)->campaign($campaignId)->goal($goalId)->delete();
```

### Tracking Code

```php
// Get Smart Code of accounts
$vwo->account($accountId)->trackingCode();
```

### Thresholds

```php
// Get account thresholds
$vwo->account($accountId)->thresholds();

// Update account thresholds
$vwo->account($accountId)->updateThreshold([
    'visitors' => 25
]);
```

### Users

```php
// Get all users
$vwo->account($accountId)->users()->all();

// Get user details
$vwo->account($accountId)->user($userId)->find();

// Create a user
$vwo->account($accountId)->users()->create([
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

```

### Drafts

```php
// Get all drafts campaigns
$drafts = $vwo->account($accountId)->drafts()->all();

// Get specific draft campaign
$draft = $vwo->account($accountId)->draft($draftId)->find();

// TODO: Update draft campaigns
// $draft = $vwo->account($accountId)->draft($draftId)->update([
//      'primaryUrl' => 'http://google.com'
// ]);

// Delete a campaign draft
$vwo->account($accountId)->draft($draftId)->delete();
```

### Sections 

```php
// TODO
```

### Billing 

```php
// TODO

```

### Labels 

```php
// TODO

```

### Partners 

```php
// TODO

```

### Third Party Integrations 

```php
// TODO

```