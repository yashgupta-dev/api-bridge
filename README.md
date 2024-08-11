# APIBridge: Unified PHP Client for Twitter, Facebook, and Google Maps

## Overview

**APIBridge** is a PHP client library designed to simplify interactions with popular APIs including Twitter, Facebook, and Google Maps. This library provides an intuitive and unified interface for making API requests, handling authentication, and parsing responses.

## Features

- **Twitter Integration**: Fetch user details and recent tweets.
- **Facebook Integration**: Retrieve user information and page posts.
- **Google Maps Integration**: Obtain geocoding and distance information.
- **Error Handling**: Manage and handle API errors gracefully.

## Installation

To get started with APIBridge, follow these steps:

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/yashgupta-dev/api-bridge.git
    cd api-bridge
    ```

2. **Install Dependencies**:

    Make sure you have [Composer](https://getcomposer.org/) installed. Then, run:

    ```bash
    composer install
    ```

## Configuration

Before using the API client, you need to set up authentication tokens and API keys for each service.

### Example Configuration

**File: `config.php`**

```php
<?php

require 'vendor/autoload.php';

use CodeCorner\APIBridge\services\facebook\FacebookClient;
use CodeCorner\APIBridge\services\maps\GoogleMapsClient;
use CodeCorner\APIBridge\services\x\X;

// Set API keys and tokens
X::setAuthToken('YOUR_TWITTER_BEARER_TOKEN');
FacebookClient::setAuthToken('YOUR_FACEBOOK_ACCESS_TOKEN');
GoogleMapsClient::setApiKey('YOUR_GOOGLE_MAPS_API_KEY');
```

## Usage

### Twitter Client

```php
<?php

require 'config.php';

use CodeCorner\APIBridge\services\x\X;

// Fetch user information
$userData = X::getUser('twitter');
print_r($userData);

// Fetch user tweets
$tweetsData = X::getTweets('USER_ID');
print_r($tweetsData);
```

### Facebook Client

```php
<?php

require 'config.php';

use CodeCorner\APIBridge\services\facebook\FacebookClient;

// Fetch user information
$userData = FacebookClient::getUser('USER_ID');
print_r($userData);

// Fetch page posts
$pagePostsData = FacebookClient::getPagePosts('PAGE_ID');
print_r($pagePostsData);
```

### Google Maps Client

```php
<?php

require 'config.php';

use CodeCorner\APIBridge\services\maps\GoogleMapsClient;

// Fetch geocode information
$geocodeData = GoogleMapsClient::getGeocode('1600 Amphitheatre Parkway, Mountain View, CA');
print_r($geocodeData);

// Fetch distance information
$distanceData = GoogleMapsClient::getDistance('place_id:ChIJN1t_tDeuEmsRUsoyG83frY4', 'place_id:ChIJN1t_tDeuEmsRUsoyG83frY4');
print_r($distanceData);
```

## Running Tests

To ensure everything is working correctly, you can run the provided PHPUnit tests.

1. **Install PHPUnit**:

    ```bash
    composer require --dev phpunit/phpunit
    ```

2. **Run Tests**:

    ```bash
    vendor/bin/phpunit tests/ApiClientTest.php
    ```

## API Reference

### Twitter Client Methods

- **`getUser($username)`**: Fetches user information by username.
- **`getTweets($userId)`**: Retrieves recent tweets by user ID.

### Facebook Client Methods

- **`getUser($userId)`**: Retrieves user information by user ID.
- **`getPagePosts($pageId)`**: Fetches posts from a Facebook page by page ID.

### Google Maps Client Methods

- **`getGeocode($address)`**: Retrieves geocoding information for a given address.
- **`getDistance($origins, $destinations)`**: Fetches distance data between origins and destinations.

## Contributing

Contributions are welcome! Please follow the guidelines in `CONTRIBUTING.md` for submitting pull requests and issues.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any questions or issues, please contact us at [yash121999@gamil.com](mailto:yash121999@gamil.com).