<?php

namespace CodeCorner\APIBridge;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

abstract class Bridge
{
    protected static $authToken;
    protected static $apiKey;
    protected static $client;
    protected static $baseUrl;

    public static function setAuthToken($token)
    {
        self::$authToken = $token;
    }

    public static function setApiKey($key)
    {
        self::$apiKey = $key;
    }

    public static function setBaseUrl($url)
    {
        self::$baseUrl = $url;
    }

    protected static function getHeaders()
    {
        $headers = ['Accept' => 'application/json'];

        if (self::$authToken) {
            $headers['Authorization'] = "Bearer " . self::$authToken;
        }

        return $headers;
    }

    protected static function getClient()
    {
        if (!isset(self::$baseUrl)) {
            throw new \Exception("Base URL is not set.");
        }

        if (!isset(self::$client)) {
            self::$client = new Client([
                'base_uri' => self::$baseUrl,
                'headers'  => self::getHeaders(),
            ]);
        }

        return self::$client;
    }

    protected static function request($method, $endpoint, $options = [])
    {
        try {
            $response = self::getClient()->request($method, $endpoint, $options);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
