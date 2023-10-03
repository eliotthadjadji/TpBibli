<?php

namespace App;

class BluRay extends Media {
    private string $realisateur;
    private string $duree;
    private string $anneeSortie;


    public function __construct(string $titre, string $realisateur, string $duree, string $anneeSortie) {
        parent::__construct($titre);
        $this->dureeEmprunt = 15;
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    public function getDuree(): string
    {
        return $this->duree;
    }

    public function getAnneeSortie(): string
    {
        return $this->anneeSortie;
    }


    public function afficher(): string {
        return "Titre : $this->titre ($this->anneeSortie) - Durée : $this->duree - $this->realisateur";
    }

}