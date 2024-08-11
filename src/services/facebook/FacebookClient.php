<?php

namespace CodeCorner\APIBridge\services\facebook;

use CodeCorner\APIBridge\Bridge;

class FacebookClient extends Bridge
{
    protected static $baseUrl = 'https://graph.facebook.com/';

    /**
     * Initialize the client with base URL
     */
    public static function initialize()
    {
        self::setBaseUrl(self::$baseUrl);
    }
    public static function getUser($userId)
    {

        self::initialize();
        return self::request('GET', "$userId");
    }

    public static function getPagePosts($pageId)
    {

        self::initialize();
        return self::request('GET', "$pageId/posts");
    }
}
