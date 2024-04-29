<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * classe test de la page d'accueil
 *
 * @author Titi L
 */
class AccueilControllerTest extends WebTestCase {

    /**
     * Test de l'accessibilité de la page d'accueil
     */
    public function testAccessPage() {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

}