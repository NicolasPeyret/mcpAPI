<?php

namespace App\Tests;

use GuzzleHttp\Client;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class LoginTest extends ApiTestCase
{
    public function testLogin()
    {
        $URL_API = "http://localhost:8000";

        $client = new Client([
            'base_uri' => $URL_API
        ]);

        $raw_response = $client->post($URL_API . '/auth', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'email' => 'a4@yopmail.com',
                'password' => 'a4@yopmail.com',
            ],
        ]);

        $response = $raw_response->getBody()->getContents();
        $GLOBALS['token'] = json_decode($response)->token;
        self::assertEquals(true, isset($GLOBALS['token']));
    }
}
