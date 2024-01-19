<?php

//Class ClientParticulier represente un particulier et non une société

namespace app;

use Exception;

class ClientParticulier implements ClientsInterface
{
    private string $nom, $prenom, $ville;
    private string $job; //futur: class Job

    private int $age;
    private float $salaire;

    /**
     * @var array<Compte>
     */
    private array $listeComptes = [];

    public function __construct(string $nom, string $prenom, string $ville, string $job, int $age, float $salaire)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->job = $job;
        $this->age = $age;
        $this->salaire = $salaire;
    }

    public function setCompte(Compte $compte)
    {
        array_push($this->listeComptes, $compte);
    }


    public function getInformationPublicClient()
    {
        return $this->nom . " " . $this->prenom;
    }
    public function verifierInformations()
    {
        return !empty($this->nom) && !empty($this->prenom) && !empty($this->ville) && !empty($this->job) && !empty($this->age) && !empty($this->salaire);
    }

    private function trouverCompte($numeroCompte)
    {
        foreach ($this->listeComptes as $compte) {
            if ($compte->getNumCompte() == $numeroCompte) {
                return $compte;
            }
        }

        throw new Exception("Compte non trouvé avec le numéro : " . $numeroCompte);
    }

    public function deposerArgent($numeroCompte,$montant)
    {
        $compte = $this->trouverCompte($numeroCompte);
        $compte->deposerMontant($montant);
        echo "Dépôt effectué avec succès." . PHP_EOL;
    }

    public function retirerArgent($numeroCompte,$montant)
    {
        $compte = $this->trouverCompte($numeroCompte);
        $compte->retirerMontant($montant);
        echo "Retrait effectué avec succès." . PHP_EOL;
    }

    public function consulterSolde($numeroCompte)
    {
        $compte = $this->trouverCompte($numeroCompte);
        return "Solde: " . $compte->consulterSolde() . PHP_EOL;
    }

    public function creerCarteBancaire($numeroCompte)
    {
        $compte = $this->trouverCompte($numeroCompte);
        $compte->creerCarteBancaire();
    }
    public function getListCompte()
    {
        echo "$this->nom $this->prenom possede les comptes: " . PHP_EOL;
        $listNumCompte = [];
        foreach ($this->listeComptes as $compte) {
            array_push($listNumCompte, $compte->getNumCompte());
            echo $compte->getNumCompte() . PHP_EOL;
        }
        return $listNumCompte;
    }
    public function getCarteInfo($numeroCompte)
    {
        $compte = $this->trouverCompte($numeroCompte);
        return $compte->getInfoCarte();
    }

}