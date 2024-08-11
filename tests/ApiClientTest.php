<?php

use PHPUnit\Framework\TestCase;
use CodeCorner\APIBridge\services\facebook\FacebookClient;
use CodeCorner\APIBridge\services\maps\GoogleMapsClient;
use CodeCorner\APIBridge\services\x\X;

class ApiClientTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();

        // Set API keys and tokens for testing
        X::setAuthToken('YOUR_TEST_TWITTER_BEARER_TOKEN');
        FacebookClient::setAuthToken('YOUR_TEST_FACEBOOK_ACCESS_TOKEN');
        GoogleMapsClient::setApiKey('YOUR_TEST_GOOGLE_MAPS_API_KEY');
    }

    public function testXGetUser()
    {
        // Test getting a user from X
        $username = 'testuser'; // Replace with a valid test username
        $userData = X::getUser($username);
        $this->assertIsArray($userData);
        $this->assertArrayHasKey('data', $userData);
        // Additional assertions based on expected response
    }

    public function testXGetTweets()
    {
        // Test getting tweets for a user
        $userId = '123456'; // Replace with a valid test user ID
        $tweetsData = X::getTweets($userId);
        $this->assertIsArray($tweetsData);
        $this->assertArrayHasKey('data', $tweetsData);
        // Additional assertions based on expected response
    }

    public function testFacebookGetUser()
    {
        // Test getting a user from Facebook
        $userId = 'testuser'; // Replace with a valid test user ID
        $userData = FacebookClient::getUser($userId);
        $this->assertIsArray($userData);
        $this->assertArrayHasKey('name', $userData);
        // Additional assertions based on expected response
    }

    public function testFacebookGetPagePosts()
    {
        // Test getting posts from a Facebook page
        $pageId = 'testpage'; // Replace with a valid test page ID
        $pagePostsData = FacebookClient::getPagePosts($pageId);
        $this->assertIsArray($pagePostsData);
        $this->assertArrayHasKey('data', $pagePostsData);
        // Additional assertions based on expected response
    }

    public function testGoogleMapsGeocode()
    {
        // Test getting geocode data from Google Maps
        $address = '1600 Amphitheatre Parkway, Mountain View, CA'; // Replace with a valid test address
        $geocodeData = GoogleMapsClient::getGeocode($address);
        $this->assertIsArray($geocodeData);
        $this->assertArrayHasKey('results', $geocodeData);
        // Additional assertions based on expected response
    }

    public function testGoogleMapsDistance()
    {
        // Test getting distance data from Google Maps
        $origins = 'place_id:ChIJN1t_tDeuEmsRUsoyG83frY4'; // Replace with valid place IDs
        $destinations = 'place_id:ChIJN1t_tDeuEmsRUsoyG83frY4';
        $distanceData = GoogleMapsClient::getDistance($origins, $destinations);
        $this->assertIsArray($distanceData);
        $this->assertArrayHasKey('rows', $distanceData);
        // Additional assertions based on expected response
    }

    public function testErrorHandling()
    {
        // Test handling errors for invalid requests
        $invalidUserId = 'invalid_id';
        $userData = X::getUser($invalidUserId);
        $this->assertArrayHasKey('error', $userData);

        $invalidPageId = 'invalid_page';
        $pagePostsData = FacebookClient::getPagePosts($invalidPageId);
        $this->assertArrayHasKey('error', $pagePostsData);

        $invalidAddress = 'invalid_address';
        $geocodeData = GoogleMapsClient::getGeocode($invalidAddress);
        $this->assertArrayHasKey('error', $geocodeData);
    }
}
