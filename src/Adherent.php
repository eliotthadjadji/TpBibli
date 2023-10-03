<?php

namespace App;

use Cassandra\Date;

class Adherent {
    private string $numeroAdherent;
    private string $prenom;
    private string $nom;
    private string $email;
    private string|\DateTime $dateAdhesion;


    public function __construct(string $prenom, string $nom, string $email, string|\DateTime $dateAdhesion = new \DateTime()) {
        $this->numeroAdherent = $this->genererNumero();
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        if ($dateAdhesion instanceof \DateTime) {
            $this->dateAdhesion = $dateAdhesion;
        } else {
            $dateAdhesion = str_replace("/","-", $dateAdhesion);
            $strToDate = new \DateTime($dateAdhesion);
            $this->dateAdhesion = $strToDate;
        }

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

    public function getDateAdhesion(): string
    {
        return $this->dateAdhesion->format("d/m/Y");
    }


    private function genererNumero() : string {
        $prefixe = "AD-";
        $chiffres = str_pad(rand(0,999999), 6, "0", STR_PAD_LEFT);
        $numeroAleatoire = $prefixe . $chiffres;
        return $numeroAleatoire;
    }

    public function afficher() : string {
        return "Numéro d'adhérent : {$this->getNumeroAdherent()}" . PHP_EOL .
            "$this->prenom $this->nom - $this->email" . PHP_EOL .
            "Date d'adhésion : {$this->getDateAdhesion()}";
    }

    public function isAdhesionValable() : bool {
        $dateJour = new \DateTime();
        $diff = $dateJour->diff($this->dateAdhesion);
        $interval = $diff->days;
        return $interval <= 365 ? true : false;
    }

    public function renouvelerAdhesion() : void {
        $this->dateAdhesion->modify("+1 year");
    }

}