<?php

namespace app;
use app\CarteBleu;

class Compte implements ComptesInterface{
    private float $solde;
    private int $numeroCompte;
    private CarteBleu $carteBleu;
    

    function __construct(float $solde) {
    	$this->solde = $solde;
    	$this->numeroCompte = $this->creerNumeroCompte();
    }

    public function deposerMontant($amount){
        $this->solde += $amount;
    }

    public function retirerMontant($amount){
        if ($amount <= $this->solde) {
            $this->solde -= $amount;
            return true;
        } else {
            throw new \Exception("Solde insuffisant.");
        }
    }

    public function consulterSolde(){
        return $this->solde;
    }

    public function creerNumeroCompte(){
        $numeroCompte=0;
        for ($i = 1; $i <= 6; $i++) {
            $numeroCompte .= rand(0, 6);
        }

        return intval($numeroCompte);
    }

    public function getNumCompte(){
        return $this->numeroCompte;
    }

    public function creerCarteBancaire(){
        $this->carteBleu=new CarteBleu($this->numeroCompte);
    }
    public function getInfoCarte(){
        return "Numero carte: ".$this->carteBleu->getNumeroCarte().", Code CCV: ".$this->carteBleu->getCodeCCV().", Fin de validite: ".$this->carteBleu->getDateFinValidite();
    }
}