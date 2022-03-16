<?php

namespace App\tests;

use GuzzleHttp\Client;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Address;

define("URL_API", "http://localhost:8000");


class AdressesControllerTest extends ApiTestCase
{

    /**
     * Test the connection and create client
     * @return Client
     */
    public function getClient(): Client
    {
        $client = new Client([
            'base_uri' => URL_API
        ]);

        $raw_response = $client->post(URL_API . '/auth', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'email' => 'a4@yopmail.com',
                'password' => 'a4@yopmail.com',
            ],
        ]);

        $response = $raw_response->getBody()->getContents();
        $GLOBALS['token'] = json_decode($response)->token;
        self::assertEquals(true, isset($GLOBALS['token']));
        return $client;
    }

    /**
     * Test a get method withou connection 
     * error awaited 401
     */
    public function testCannotListAddressesWithoutAuth()
    {
        $client = $this->createClient();
        $client->request('GET', '/api/addresses');

        $this->assertResponseStatusCodeSame(401);
    }

    /**
     * test on a get methode
     * 200 awaited 
     */
    public function testGetListAddressesWithToken()
    {
        $client = self::getClient();
        //dd($client);
        $raw_response = $client->get(URL_API . '/api/addresses', [
            'headers' => [
                'Authorization' => 'Bearer ' . $GLOBALS['token']
            ],
        ]);
        $response = $raw_response->getStatusCode();
        self::assertEquals(200, $response);
        //self::assertResponseStatusCodeSame(200);
    }

     /**
     * test on a post methode
     * 201 awaited 
     */
    public function testPostAddressesWithToken()
    {
        $client = self::getClient();
        //dd($client);
        $address = new Address();

        $raw_response = $client->post(URL_API . '/api/addresses', [
            'headers' => [
                'Authorization' => 'Bearer ' . $GLOBALS['token']
            ],
            'json' => [ json_encode($address) ]
        ]);
        $response = $raw_response->getStatusCode();
        self::assertEquals(201, $response);
        //self::assertResponseStatusCodeSame(200);
    }

     /**
     * test on a post methode
     * 201 awaited 
     */
    // public function testDeleteListAddressesWithToken()
    // {
    //     $client = self::getClient();
    //     //dd($client);
    //     $address = new Address();

    //     $raw_response = $client->delete(URL_API . '/api/addresses', [
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . $GLOBALS['token']
    //         ],
    //         'json' => [ json_encode($address) ]
    //     ]);
    //     $response = $raw_response->getStatusCode();
    //     self::assertEquals(201, $response);
    //     //self::assertResponseStatusCodeSame(200);
    // }
}
