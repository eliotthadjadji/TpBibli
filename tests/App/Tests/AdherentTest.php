<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;


class AdherentTest extends TestCase {
    /**
     * @test
     */
    public function Egalite_DateAdhesionAdherent_EgaleADateDuJour () {
        $adherent = new \App\Adherent("fee", "lee", "feelee@gmail.com");
        $this->assertEquals((new \DateTime())->format("d/m/Y"), $adherent->getDateAdhesion());
    }

    /**
     * @test
     */
    public function Egalite_DateAdhesionAdherent_EgaleADateInseree () {
        $adherent = new \App\Adherent("fee", "lee", "feelee@gmail.com", "25/04/2023");
        $this->assertEquals("25/04/2023", $adherent->getDateAdhesion());
    }

}