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

    public function deposerArgent($montant, $numeroCompte)
    {
        foreach ($this->listeComptes as $compte) {
            if ($compte->getNumCompte() == $numeroCompte) {
                $compte->deposerMontant($montant);
                echo "Dépôt effectué avec succès." . PHP_EOL;
            } else {
                throw new Exception("Erreur dans le depot, le compte n'existe pas");
            }
        }




    }

    public function retirerArgent($montant, $numeroCompte)
    {
        foreach ($this->listeComptes as $compte) {
            if ($compte->getNumCompte() == $numeroCompte) {
                $compte->retirerMontant($montant);
                echo "retrait effectué avec succès." . PHP_EOL;
            } else {
                throw new Exception("Erreur dans le retrait, le compte n'existe pas");
            }
        }
    }

    public function consulterSolde($numeroCompte)
    {
        foreach ($this->listeComptes as $compte) {
            if ($compte->getNumCompte() == $numeroCompte) {
                return "Solde: " . $compte->consulterSolde() . PHP_EOL;

            } else {
                throw new Exception("Erreur dans la demande, le compte n'existe pas" . PHP_EOL);
            }
        }
    }

    public function getCompteDuClient($numeroCompte)
    {
        foreach ($this->listeComptes as $compte) {
            if ($compte->getNumCompte() == $numeroCompte) {
                return $compte;
            } else {
                throw new Exception("Pas de compte enregistré a ce numero: " . $numeroCompte . ".");
            }
        }
    }

}