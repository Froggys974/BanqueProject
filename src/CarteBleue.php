<?php


namespace app;

use app\CartesBancairesInterface;

class CarteBleu implements CartesBancairesInterface
{
    private int $numeroCompte;
    private int $numeroCarte;
    private int $codeCCV;


    function __construct(int $numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;
        $this->numeroCarte = $this->genererNumeroCarte();
        $this->codeCCV = $this->genererCodeCCV();
    }

    private function genererNumeroCarte()
    {
        for ($i = 1; $i <= 16; $i++) {
            $numeroCarte .= rand(0, 9);
        }

        return intval($numeroCarte);
    }

    private function genererCodeCCV()
    {
        for ($i = 1; $i <= 3; $i++) {
            $numeroCarte .= rand(0, 9);
        }

        return intval($numeroCarte);
    }


}

