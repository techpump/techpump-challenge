<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class APIService
{
    const API_URL = ''; //!TODO destination API_URL has been lost through the code, help us find it

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $country
     * @return string
     * @throws GuzzleException
     */
    public function sendToken(string $name, string $email, string $country): string
    {
        // TODO LINK DOCUMENTATION http://docs.guzzlephp.org/en/stable/index.html

        $response = $this->client->request('POST', self::API_URL, [
            'name' => $name,
            'email' => $email,
            'country' => $country
        ]);

        return $response->getStatusCode() === 200 ? $response->getBody()->getContents(): false;
    }
}
