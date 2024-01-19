<?php
namespace app;

interface ClientsInterface{
    public function getInformationPublicClient();
    public function verifierInformations();
    public function setCompte(Compte $compte);

    public function consulterSolde($numeroCompte);
    public function retirerArgent($numeroCompte,$montant);
    public function deposerArgent($numeroCompte,$montant);
    public function creerCarteBancaire($numeroCompte);
    public function getListCompte();

    public function getCarteInfo($numeroCompte);
    
}