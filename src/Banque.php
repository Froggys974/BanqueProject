<?php


namespace app;

use app\ClientsInterface;
use app\Compte;

class Banque
{
    private string $nom;
    /**  
     * @var array<ClientsInterface>
     */
    private array $listeclient;


    function __construct(string $nom, array $listeclient)
    {
        $this->nom = $nom;
        $this->listeclient = $listeclient;
    }

    public function enregistrerNouveauClient(ClientsInterface $client)
    {
        if ($client->verifierInformations()) {
            array_push($this->listeclient, $client);
            $compte = new Compte(0.0);
            $client->setCompte($compte);
        } else {
            throw new \Exception("Informations manquantes pour ajouter le client.");
        }
    }

    public function afficherListeClient()
    {
        foreach ($this->listeclient as $client) {
            echo $client->getInformationPublicClient() . PHP_EOL;
        }
    }

    public function demandeCarteBleu(ClientsInterface $client, int $numeroCompte)
    {
        if (in_array($client, $this->listeclient)) {
            $compteClient = $client->getCompte($numeroCompte);
            $compteClient.creerCarteBancaire();
        } else {
            echo "Cette personne n'est pas cliente chez nous";
        }
    }
}


