<?php

namespace CodeCorner\APIBridge\services\x;

use CodeCorner\APIBridge\Bridge;

/**
 * X (Twitter)
 */
class X extends Bridge
{
    protected static $baseUrl = 'https://api.twitter.com/2/';

    /**
     * Initialize the client with base URL
     */
    public static function initialize()
    {
        self::setBaseUrl(self::$baseUrl);
    }

    /**
     * Get user by username
     *
     * @param  string $username
     * @return array
     */
    public static function getUser($username)
    {
        self::initialize();
        return self::request('GET', "users/by/username/$username");
    }

    /**
     * Get tweets by user ID
     *
     * @param  string $userId
     * @return array
     */
    public static function getTweets($userId)
    {
        self::initialize();
        return self::request('GET', "users/$userId/tweets");
    }
}
