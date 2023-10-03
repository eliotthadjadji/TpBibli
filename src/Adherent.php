<?php

namespace App;

class Adherent {
    private string $numeroAdherent;
    private string $prenom;
    private string $nom;
    private string $email;
    private string|\DateTime $dateAdhesion;


    public function __construct(string $prenom, string $nom, string $email, string|\DateTime $dateAdhesion = new \DateTime())
    {
        $this->numeroAdherent = $this->genererNumero();
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->dateAdhesion = $dateAdhesion->format("d/m/y");
    }

    public function getNumeroAdherent(): string
    {
        return $this->numeroAdherent;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateAdhesion(): string|\DateTime
    {
        return $this->dateAdhesion;
    }


    private function genererNumero() : string {
        $prefixe = "AD-";
        $chiffres = str_pad(rand(0,999999), 6, "0", STR_PAD_LEFT);
        $numeroAleatoire = $prefixe . $chiffres;
        return $numeroAleatoire;
    }

    public function find() : string {
        return "Numéro d'adhérent : {$this->getNumeroAdherent()}" . PHP_EOL .
            "$this->prenom $this->nom - $this->email" . PHP_EOL .
            "Date d'adhésion : {$this->getDateAdhesion()}";
    }

    public function isAdhesionValable() : bool {
        $dateJour = new \DateTime();
        $diff = $dateJour->diff($this->dateAdhesion);
        $interval = $diff->days;
        $interval <= 365 ? true : false;
    }

    public function renouvelerAdhesion() : void {
        $this->dateAdhesion = new \DateTime();
    }

}