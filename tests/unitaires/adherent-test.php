<?php

require_once "vendor/autoload.php";
require_once "tests/utils/couleurs.php";

// Test date d'adhésion = date du jour
$adherent1 = new \App\Adherent("fee", "lee", "feelee@gmail.com");
$resultat = $adherent1->getDateAdhesion();
if ($resultat == (new DateTime())->format("d/m/Y")) {
    echo GREEN . "Test 1 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 1 pas OK" . RESET . PHP_EOL;
}


// Test date d'adhésion = date précisée
$adherent2 = new \App\Adherent("fee", "lee", "feelee@gmail.com", "25/04/2023");
$resultat = $adherent2->getDateAdhesion();
if ($resultat == "25/04/2023") {
    echo GREEN . "Test 2 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 2 pas OK" . RESET . PHP_EOL;
}


// Test numéro adhérant
$adherent3 = new \App\Adherent("fee", "lee", "feelee@gmail.com");
$resultat = $adherent3->getNumeroAdherent();
if (str_starts_with($resultat, "AD-")) {
    echo GREEN . "Test 3 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 3 pas OK" . RESET . PHP_EOL;
}


// Test adhésion valide
$adherent4 = new \App\Adherent("fee", "lee", "feelee@gmail.com", "15/05/2023");
$resultat = $adherent4->isAdhesionValable();
if ($resultat) {
    echo GREEN . "Test 4 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 4 pas OK" . RESET . PHP_EOL;
}


// Test adhésion non valide
$adherent5 = new \App\Adherent("fee", "lee", "feelee@gmail.com", "15/05/2020");
$resultat = $adherent5->isAdhesionValable();
if (!$resultat) {
    echo GREEN . "Test 5 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 5 pas OK" . RESET . PHP_EOL;
}


// Test renouveler adhésion
$adherent6 = new \App\Adherent("fee", "lee", "feelee@gmail.com", "15/05/2020");
$dateAdhesion = str_replace("/","-", $adherent6->getDateAdhesion());
$dateNouvelleAdhesion = new DateTime($dateAdhesion);
$dateNouvelleAdhesion->modify("+1 year");

$resultat = $adherent6->renouvelerAdhesion();
if ($adherent6->getDateAdhesion() == $dateNouvelleAdhesion->format("d/m/Y")) {
    echo GREEN . "Test 6 OK" . RESET . PHP_EOL;
} else {
    echo RED . "Test 6 pas OK" . RESET . PHP_EOL;
}