<?php
class Personnage{
    public $vie;
    public $atk;
    public $name;
    public $bonus;
    public $armure;

    public function __construct($name, $vie, $atk, $bonus_vie = 0, $bonus_armure = 0){
        $this->name = $name;
        $this->vie = $vie;
        $this->atk = $atk;
        $this->bonus_vie = $bonus_vie;
        $this->bonus_armure = $bonus_armure;
    }

    public function attack($cible){
        echo"Avant le début du round, la vie du " . $cible->name . " était de " . $cible->vie . "<br>";
        $cible->vie = max($cible->vie - $this->calcul_damage($cible), 0);
        echo"À la fin du round, la vie du " . $cible->name . " est de " . $cible->vie . "<br>";
    }

    public function calcul_damage($cible){
        $atk  = $this->atk;
        $bonus_armure = 0;
        $bonus_vie = 0;

        $shuffle_bonus = rand(0, 4);
        if ($shuffle_bonus == 1 && $cible->bonus_vie > 0) {
            echo "Votre Héros reçoit le bonus de vie !<br>";
            $bonus_vie = $cible->bonus_vie;
        }

        $shuffle_armure = rand(0, 2);
        if ($shuffle_armure == 1 && $cible->bonus_armure > 0) {
            echo "Votre Héros recoit le bonus d'armure !<br>";
            $bonus_armure = $cible->bonus_armure;
        }

        return max(0, $atk - $bonus_vie - $bonus_armure);
    }
}