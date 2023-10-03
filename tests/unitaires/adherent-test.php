<?php

require_once "vendor/autoload.php";

$adherent = new \App\Adherent("fee", "lee", "feelee@gmail.com", "05/10/2021");
echo $adherent->find();