<?php

namespace CodeCorner\APIBridge\services\maps;

use CodeCorner\APIBridge\Bridge;

class GoogleMapsClient extends Bridge
{
    protected static $baseUrl = 'https://maps.googleapis.com/maps/api/';

    /**
     * Initialize the client with base URL
     */
    public static function initialize()
    {
        self::setBaseUrl(self::$baseUrl);
    }

    public static function getGeocode($address)
    {
        self::initialize();
        return self::request('GET', 'geocode/json', ['query' => ['address' => $address]]);
    }

    public static function getDistance($origins, $destinations)
    {   
        self::initialize();
        return self::request('GET', 'distancematrix/json', [
            'query' => [
                'origins'      => $origins,
                'destinations' => $destinations
            ]
        ]);
    }
}
