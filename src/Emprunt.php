<?php

namespace App;

class Emprunt {
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private ?\DateTime $dateRetour;
    private Adherent $adherent;
    private Media $media;


    public function __construct(Adherent $adherent, Media $media, \DateTime $dateRetour = null) {
        $this->dateEmprunt = new \DateTime();
        $this->adherent = $adherent;
        $this->media = $media;
        $this->dateRetour = $dateRetour;

        $duree = $this->media->getDureeEmprunt();
        $dureeAjoutee = new \DateTime();
        $this->dateRetourEstimee = $dureeAjoutee->modify("$duree days");
    }


    public function getDateEmprunt(): \DateTime
    {
        return $this->dateEmprunt;
    }

    public function getDateRetourEstimee(): \DateTime
    {
        return $this->dateRetourEstimee;
    }

    public function getDateRetour(): \DateTime
    {
        return $this->dateRetour;
    }

    public function getAdherent(): Adherent
    {
        return $this->adherent;
    }

    public function getMedia(): Media
    {
        return $this->media;
    }


    public function afficher() : string {
        return "Date d'emprunt : {$this->dateEmprunt->format("d/m/Y")}" . PHP_EOL .
            "Date de retour estimée : {$this->dateRetourEstimee->format("d/m/Y")}" . PHP_EOL .
            "Adhérant : {$this->adherent->getNumeroAdherent()}" . PHP_EOL .
            "Média emprunté : {$this->media->getTitre()}";
    }

    public function isEnCours() : bool {
        return $this->dateRetour == null ? true : false;
    }

    public function isEnAlerte() : bool {
        return ($this->dateRetourEstimee->getTimestamp() > (new \DateTime())->getTimestamp()) && $this->dateRetour == null ? true : false;
    }

    public function isDureeDepassee() : bool {
        if (isset($this->dateRetour)) {
            return $this->dateRetour->getTimestamp() < $this->dateRetourEstimee->getTimestamp() ? true : false;
        } else {
            return false;
        }
    }


}
