<?php

namespace App\Tests\Repository;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * tests des méthodes du repository des catégories
 *
 * @author Titi L
 */
class CategorieRepositoryTest extends KernelTestCase{

    /**
     * Récupère le repository de Categorie
     * @return CategorieRepository
     */
    public function recupRepository() : CategorieRepository {
        self::bootKernel();
        $repository = self::getContainer()->get(CategorieRepository::class);
        return $repository;
    }

    /**
     * Création d'une instance de Categorie avec nom
     * @return Categorie
     */
    public function newCategorie() : Categorie {
        $categorie = (new Categorie())
                ->setName('Swift');
        return $categorie;
    }

    /**
     * Test de la méthode findByName du repository Categorie avec le nom swift
     */
    public function testFindByName() {
        $repository = $this->recupRepository();
        $categorie = $this->newCategorie();
        $repository->add($categorie, true);
        $categorieTrouvee = $repository->findByName("Swift");
        $this->assertEquals("Swift", $categorieTrouvee[0]->getName());
    }

}