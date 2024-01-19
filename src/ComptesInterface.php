<?php
namespace app;

interface ComptesInterface{
    
    public function deposerMontant($amount);

    public function retirerMontant($amount);

    public function consulterSolde();

    public function creerCarteBancaire($carteBancaire);
}