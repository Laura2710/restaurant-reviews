<?php

namespace App\controllers;

use App\models\ModelRestaurant;
use App\vues\Vue;

class CtrlAccueil
{
    public function afficherAccueil()
    {
        $vue = new Vue('accueil');
        $restaurantModel = new ModelRestaurant();
        $restaurants = $restaurantModel->getAllRestaurants();
        $donneesVue = [
            'titre' => 'Restaurants préférés',
            'restaurants' => $restaurants
        ];
        $vue->afficher($donneesVue);
    }
}
