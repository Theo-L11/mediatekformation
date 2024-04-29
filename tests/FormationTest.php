<?php

namespace App\Tests;

use App\Entity\Formation;
use PHPUnit\Framework\TestCase;

/**
 * test sur une formation
 *
 * @author Titi L
 */
class FormationTest extends TestCase {
    /**
     * Test de la date d'ajout d'une formation
     */
    public function testGetPublishedAtString() {
        $formation = new Formation();
        $formation->setPublishedAt(new \DateTime("2023-05-15 17:00:12"));
        $this->assertEquals("15/05/2023", $formation->getPublishedAtString());
    }
}