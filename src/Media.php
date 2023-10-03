<?php

namespace App;

abstract class Media {
    protected string $titre;
    protected int $dureeEmprunt;


    public function __construct(string $titre)
    {
        $this->titre = $titre;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }

    abstract public function afficher() : string;



}