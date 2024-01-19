<?php


namespace app;

Use app\CartesBancairesInterface;

class CarteBleu implements CartesBancairesInterface
{
    private int $numeroCompte;
    private int $numeroCarte;
    private int $codeCCV;
    private \DateTime $dateFinValidite;


    function __construct(int $numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;
        $this->setNumeroCarte();
        $this->setCodeCCV();
        $this->setDateFinValidite();
    }

    private function setNumeroCarte()
    {
        $numeroCarte=0;
        for ($i = 1; $i <= 16; $i++) {
            $numeroCarte .= rand(0, 9);
        }

        $this->numeroCarte = intval($numeroCarte);
    }

    private function setCodeCCV()
    {
        $codeCCV=0;
        for ($i = 1; $i <= 3; $i++) {
            $codeCCV .= rand(0, 9);
        }

        $this->codeCCV = intval($codeCCV);
    }

    private function setDateFinValidite()
    {
        $dateActuelle = new \DateTime();
        $dateDans5Ans = clone $dateActuelle;
        $dateDans5Ans->modify('+5 years');
        $this->dateFinValidite = $dateDans5Ans;
    }

    public function getValidite()
    {

        $dateActuelle = new \DateTime();

;


        $diff = $dateActuelle->diff($this->dateFinValidite);

        echo "Temps restant avant fin de validite: " . $diff->format('%y années, %m mois, %d jours, %h heures, %i minutes, %s secondes') . PHP_EOL;

    }
    


    /**
    * @return int
    */
    public function getNumeroCarte(): int {
    	return $this->numeroCarte;
    }

    /**
    * @return int
    */
    public function getCodeCCV(): int {
    	return $this->codeCCV;
    }

    public function getDateFinValidite()
    {
        return $this->dateFinValidite->format('%y années, %m mois');
    }
    
}

