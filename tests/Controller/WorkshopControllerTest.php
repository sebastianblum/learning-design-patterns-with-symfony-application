<?php


namespace App\Tests\Controller;

use App\Controller\WorkshopController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WorkshopControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('Index', $crawler->filter('h1')->text());
    }
}
