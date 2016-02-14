<?php

namespace AGIL\ProfileBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    private $client = null;

    /**
     * Méthode qui initialise le client de test
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     *
     */
    public function testShow()
    {
        $this->client->request('GET', '/profile/edit');

        $crawler = $this->client->followRedirect();

        $form = $crawler->selectButton('_submit')->form(array(
            '_username' => 'amicale@amicale.dev',
            '_password' => 'amicale'
        ));

        $this->client->submit($form);
        $this->client->followRedirect();
        $this->assertContains('Informations générales', $this->client->getResponse()->getContent());
    }
}
