<?php

require __DIR__ . "/vendor/autoload.php";

use app\Banque;
use app\ClientParticulier;


// Créer une banque
$maBanque = new Banque("Banque XYZ", []);

// Créer un client particulier
$client1 = new ClientParticulier("Doe", "John", "Paris", "Ingénieur", 30, 50000.0);

$client2 = new ClientParticulier("Grondin", "Florent", "Paris", "Developpeur", 22, 3000.0);

// Enregistrer le client à la banque
$maBanque->enregistrerNouveauClient($client1);
$maBanque->enregistrerNouveauClient($client2);


// Afficher la liste des clients de la banque
echo "Liste des clients dans la banque :" . PHP_EOL;
$maBanque->afficherListeClient();

$client1->getListCompte();
$client2->getListCompte();

$compteClient1 = $client1->getListCompte()[0];
//$maBanque->demanderCarteBleue($client1,522643); //erreur
$maBanque->demanderCarteBleue($client1, $compteClient1);

echo $client1->getCarteInfo($compteClient1);
echo PHP_EOL;
echo $client1->consulterSolde($compteClient1);
$client1->deposerArgent($compteClient1,50);

echo PHP_EOL;
echo $client1->consulterSolde($compteClient1);

$client1->retirerArgent($compteClient1,10);

echo PHP_EOL;
echo $client1->consulterSolde($compteClient1);




