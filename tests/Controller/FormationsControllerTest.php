<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * classe test des formations
 *
 * @author Titi L
 */
class FormationsControllerTest extends WebTestCase {

    /**
     * Teste que le lien sur la miniature d'une formation renvoie la bonne page 
     * et que celle-ci contient le bon titre
     */
    public function testLinkFormation() {
        $client = static::createClient();
        $client->request('GET', '/formations');
        $client->clickLink("Image miniature d'une formation");
        $response = $client->getResponse();
        // la page est accessible
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        // l'uri de la page correspond à la bonne page
        $uri = $client->getRequest()->server->get("REQUEST_URI");
        $this->assertEquals('/formations/formation/4', $uri);
        // La page contient un h4 avec le nom correspondant à la formation
        $this->assertSelectorTextContains('h4', 'Eclipse n°5 : Refactoring');
    }

    /**
     * Test du bouton tri des formations dans l'ordre ascendant
     */
    public function testTriNomFormations() {
        $client = static::createClient();
        $client->request('GET', '/formations/tri/title/ASC');
        // le premier h5 de la page contient le bon texte
        $this->assertSelectorTextContains('h5', 'Android Studio (complément n°1) : Navigation Drawer et Fragment');
    }

    /**
     * Test du formulaire de filtre des formations
     */
    public function testFiltreFormations() {
        $client = static::createClient();
        $client->request('GET', '/formations');
        $crawler = $client->submitForm('filtrer', [
            'recherche' => 'Test1'
        ]);
        // la liste renvoie un seul h5
        $this->assertCount(1, $crawler->filter('h5'));
        // le h5 contient le titre adéquat
        $this->assertSelectorTextContains('h5', 'Test1');
    }

}