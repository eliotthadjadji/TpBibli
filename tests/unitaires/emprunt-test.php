<?php

require_once "vendor/autoload.php";
require_once "tests/utils/couleurs.php";


$adherent = new \App\Adherent("fee", "lee", "feelee@gmail.com");
$livre = new \App\Livre("Livre", "ISBN-45120", "toto", 120);
$bluRay = new \App\BluRay("BluRay", "Real", "50", "2002");
$magazine = new \App\Magazine("Magazino", "9", "2015");


$empruntLivre = new \App\Emprunt($adherent, $livre);
$empruntBluRay = new \App\Emprunt($adherent, $bluRay);
$empruntMagazine = new \App\Emprunt($adherent, $magazine);

// Test vérification date d'emprunt = date du jour
if ($empruntLivre->getDateEmprunt()->format("d/m/Y") == (new DateTime())->format("d/m/Y")) {
    echo GREEN . "Test 1 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 1 pas OK" . RESET . PHP_EOL;
}


// Test vérification date de retour d'un livre
$dateRetour = new DateTime();
$dateRetour->modify("+21 days");
if ($empruntLivre->getDateRetourEstimee()->format("d/m/Y") == $dateRetour->format("d/m/Y")) {
    echo GREEN . "Test 2 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 2 pas OK" . RESET . PHP_EOL;
}


// Test vérification date de retour d'un blu-ray
$dateRetour = new DateTime();
$dateRetour->modify("+15 days");
if ($empruntBluRay->getDateRetourEstimee()->format("d/m/Y") == $dateRetour->format("d/m/Y")) {
    echo GREEN . "Test 3 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 3 pas OK" . RESET . PHP_EOL;
}


// Test vérification date de retour d'un magazine
$dateRetour = new DateTime();
$dateRetour->modify("+10 days");
if ($empruntMagazine->getDateRetourEstimee()->format("d/m/Y") == $dateRetour->format("d/m/Y")) {
    echo GREEN . "Test 4 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 4 pas OK" . RESET . PHP_EOL;
}


// Test fonction isEnCours
if ($empruntLivre->isEnCours()) {
    echo GREEN . "Test 5 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 5 pas OK" . RESET . PHP_EOL;
}


// Test fonction isEnAlerte
if ($empruntLivre->isEnAlerte()) {
    echo GREEN . "Test 6 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 6 pas OK" . RESET . PHP_EOL;
}


// Test fonction isDureeDepassee - doit afficher Test pas OK
$dateDepassee = new DateTime("2023-12-18");
$empruntLivre = new \App\Emprunt($adherent, $livre, $dateDepassee);
if ($empruntLivre->isDureeDepassee()) {
    echo GREEN . "Test 7 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 7 pas OK" . RESET . PHP_EOL;
}
