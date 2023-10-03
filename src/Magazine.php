<?php

namespace App;

class Magazine extends Media {
    private string $numero;
    private string $dateSortie;


    public function __construct(string $titre, int $dureeEmprunt, string $numero, string $dateSortie) {
        parent::__construct($titre, $dureeEmprunt);
        $this->numero = $numero;
        $this->dateSortie = $dateSortie;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getDateSortie(): string
    {
        return $this->dateSortie;
    }


    public function afficher(): string {
        return "Titre : $this->titre - N° $this->numero - $this->dateSortie";
    }

}