<?php

namespace App;

class Livre extends Media {
    private string $isbn;
    private string $auteur;
    private int $nbPages;


    public function __construct(string $titre, int $dureeEmprunt, string $isbn, string $auteur, int $nbPages) {
        parent::__construct($titre, $dureeEmprunt);
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getNbPages(): int
    {
        return $this->nbPages;
    }


    public function afficher(): string {
        return "Titre : $this->titre - ISBN : $this->isbn" . PHP_EOL .
            "$this->auteur - $this->nbPages pages";
    }

}