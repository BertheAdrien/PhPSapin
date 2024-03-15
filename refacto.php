<?php

class Sapin{

    private $nbMaxEtoile;
    public $nbEtage = 10;
    public $garland;
    public $isBalls = TRUE;
    public $nbEtoile1 = 1;
    public $nbEtoile2 = 3;
    public $nbEtoile3 = 7;
    public $isGarland = TRUE;
    public $count = 0;

    public function __construct(){
        $this->nbMaxEtoile = $this->getMaxStarNumber();
        $this->garland = $this->defineGarlandSymbol();
        $this->afficher_sapin();
        $this->dessinerBoules();
        $this->dessinerTronk();
    }

    private function dessinerTronk(){
        for ($i = 0; $i < $this->nbEtage + $this-> count; $i++){
            $this->tronk();
        }
    }
    
    private function tronk() {
        $a = "<pre style='margin: 0;'>";
        $a .= str_repeat(" ", ($this->nbMaxEtoile - 1) / 2);
        $a .= str_repeat("*", 3);
        $a .= str_repeat(" ", ($this->nbMaxEtoile - 3) / 2);
        $a .= "</pre>";

        echo $a;       
    }
    private function dessinerBoules(){
        if($this->isBalls){
            $this->barreBoules("|");
            $this->barreBoules("0");
        }
        else{
            $this->count = 2;
        }
    }

    private function barreBoules($symbol){
        $ligneBoules = "<pre style = 'margin: 0;'>"; 
        $ligneBoules .= str_repeat(" ". $symbol, ($this->nbMaxEtoile - 3)/4); 
        $ligneBoules .= " "; 
        $ligneBoules .= str_repeat("*", 3);
        $ligneBoules .= " ";
        $ligneBoules .= str_repeat($symbol . " ", ($this->nbMaxEtoile - 3)/4); 
        $ligneBoules .= "</pre>";

        echo $ligneBoules;
    }
        
    
    private function getMaxStarNumber(){
        return (3 + 2*($this->nbEtage - 1))*2 + 1;
        
    }
    private function defineGarlandSymbol(){
        if($this->isGarland){
            return$this->garland = "S";
        } 
        return $this->garland = " ";     
    }
    private function afficher_sapin(){
        for($i = 0; $i <= $this->nbEtage - 1; $i++){
            $row1 = "<pre style = 'margin: 0;'>" . " " . str_repeat(" ", ($this->nbMaxEtoile - $this->nbEtoile1) / 2) . str_repeat("*", $this->nbEtoile1) . str_repeat(" ", ($this->nbMaxEtoile - $this->nbEtoile1) / 2) . " " . "</pre>";
            $row2 = "<pre style = 'margin: 0;'>" . " " . str_repeat(" ", ($this->nbMaxEtoile - $this->nbEtoile2) / 2) . str_repeat("*", $this->nbEtoile2) . str_repeat(" ", ($this->nbMaxEtoile - $this->nbEtoile2) / 2) . " " . "</pre>";
            $row3 = "<pre style = 'margin: 0;'>" . str_repeat(" ", ($this->nbMaxEtoile - $this->nbEtoile3) / 2) . $this->garland . str_repeat("*", $this->nbEtoile3) . $this->garland . str_repeat(" ", ($this->nbMaxEtoile - $this->nbEtoile3) / 2) . "</pre>";

            echo $row1;
            echo $row2;
            echo $row3;

            $this->nbEtoile1 = $this->nbEtoile2;
            $this->nbEtoile2 = $this->nbEtoile3;
            $this->nbEtoile3 += 4;
        }
    }
    
}

new sapin();







