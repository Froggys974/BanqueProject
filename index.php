<?php

require __DIR__ ."/vendor/autoload.php";

Use app\Banque;
Use app\ClientParticulier;

$banque = new Banque("test",[]);

$client=new ClientParticulier("NOM","PRENOM","VILLE","JOB",14,13.0);
$client2=new ClientParticulier("NOzM","PRENsOM","VILLE","JOB",14,13.0);

$banque->enregistrerNouveauClient($client);
$banque->enregistrerNouveauClient($client2);
$banque->afficherListeClient();


