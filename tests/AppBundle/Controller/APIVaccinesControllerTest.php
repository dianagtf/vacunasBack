<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;

class APIVaccinesControllerTest extends WebTestCase
{
    const RUTA_API = '/api/v1/vacunas';
    /**
     *
     */
    public function testCgetAPIVaccinesAction200()
    {
        /* @var Client $client*/
        $client = static::createClient();

        $client->request('GET', self::RUTA_API);
        $response = $client->getResponse();

        self::assertTrue($response->isSuccessful());
        self::assertJson($response->getContent());
        $datos = json_decode($response->getContent(), true);
        self::assertArrayHasKey('vacunas', $datos);
    }
}
