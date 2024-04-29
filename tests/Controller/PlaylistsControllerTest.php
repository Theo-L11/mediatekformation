<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


/**
 * classe test des playlists
 *
 * @author Titi L
 */
class PlaylistsControllerTest extends WebTestCase {

    /**
     * Test que le clic sur le bouton "Voir détail" renvoie la bonne page
     * qui correspond à la playlist demandée
     */
    public function testBoutonDetail() {
        $client = static::createClient();
        $client->request('GET', '/playlists');
        $client->clickLink('Voir détail');
        $response = $client->getResponse();
        //la page est accessible
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        // l'uri de la page correspond à la bonne page
        $uri = $client->getRequest()->server->get("REQUEST_URI");
        $this->assertEquals('/playlists/playlist/13', $uri);
        // La page contient un h4 avec le nom correspondant à la bonne playlist
        $this->assertSelectorTextContains('h4', 'Bases de la programmation (C#)');
    }

    /**
     * Test du tri des playlists dans l'ordre alphabétique décroissant
     */
    public function testTriNomPlaylists() {
        $client = static::createClient();
        $client->request('GET', '/playlists/tri/name/DESC');
        // lors du tri décroissant, le premier titre est le bon
        $this->assertSelectorTextContains('h5', 'Visual Studio 2019 et C#');
    }

    /**
     * Test du formulaire de filtre des playlists
     */
    public function testFiltrePlaylists() {
        $client=static::createClient();
        $client->request('GET', '/playlists');
        $crawler = $client->submitForm('filtrer', [
            'recherche' => 'Test'
        ]);
        // la liste renvoie un seul h5
        $this->assertCount(1, $crawler->filter('h5'));
        // le h5 contient le titre entré dans le formulaire
        $this->assertSelectorTextContains('h5', 'Test');
    }

}