<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Personnage.php';
require 'Autoloader.php';
Autoloader::register();

function combat(){
    $heros = new Personnage("Héros", 200, 30, 50, 20);
    $chef_minion = new Personnage("Chef Minion", 100, 60);

    for($i = 1; $i <= 5; $i++){
        if($heros->vie <= 0 || $chef_minion->vie <= 0)
        {
            if($heros->vie <= 0){
                echo 'Votre Héros est mort :(<br>';
            }
            if($chef_minion->vie <= 0){
                echo 'Bien jouer, le Chef Minion est mort';
            }
            break;
        }

        echo'Round ' . $i . '<br>';
        
        $chef_minion->attack($heros);
        $heros->attack($chef_minion);
        
        echo'<pre></pre>';
    }   
}

combat();
