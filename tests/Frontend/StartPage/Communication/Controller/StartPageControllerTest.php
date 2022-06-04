<?php

namespace App\Tests\Frontend\StartPage\Communication\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StartPageControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Modular Symfony Template');
    }
}