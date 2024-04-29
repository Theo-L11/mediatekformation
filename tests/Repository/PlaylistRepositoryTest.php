<?php

namespace App\Tests\Repository;

use App\Entity\Formation;
use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * tests des méthodes du repository des playlists
 *
 * @author Titi L
 */
class PlaylistRepositoryTest extends KernelTestCase {

    /**
     * Récupère le repository de Playlist
     * @return PlaylistRepository
     */
    public function recupRepository(): PlaylistRepository {
        self::bootKernel();
        $repository = self::getContainer()->get(PlaylistRepository::class);
        return $repository;
    }

    /**
     * Test de la méthode findAllOrderByNumber du repository de Playlist
     */
    public function testFindAllOrderbyNumber() {
        $repository = $this->recupRepository();
        $playlists = $repository->findAllOrderByNumber("DESC");
        $this->assertEquals(13, $playlists[0]->getId());
    }

}