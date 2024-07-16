<?php

namespace App\controllers;

use App\src\vues\Vue;

class Router
{
    private $ctrlAccueil;
    private $ctrlRestaurant;

    public function __construct()
    {
        $this->ctrlAccueil = new CtrlAccueil();
        $this->ctrlRestaurant = new CtrlRestaurant();
    }

    public function query()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'restaurant') {
                if (isset($_GET['idRestaurant'])) {
                    $this->ctrlRestaurant->afficherRestaurant($_GET['idRestaurant']);
                } else {
                    $this->afficherErreur(404, 'ID du restaurant manquant');
                }
            } else {
                $this->afficherErreur(404, 'Page introuvable');
            }
        } else {
            $this->ctrlAccueil->afficherAccueil();
        }
    }

    private function afficherErreur($code, $description)
    {
        $vue = new Vue("erreur");
        $e = (object)array(
            'code' => $code,
            'description' => $description
        );
        $vue->afficher(array('e' => $e));
    }
}

?>
