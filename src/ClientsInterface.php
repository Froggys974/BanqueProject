<?php
namespace app;

interface ClientsInterface{
    public function getInformationPublicClient();
    public function verifierInformations();
    public function setCompte(Compte $compte);

    public function consulterSolde($numeroCompte);
    public function retirerArgent($montant,$numeroCompte);
    public function deposerArgent($montant,$numeroCompte);
    public function getCompte($numeroCompte);
    
}