<?php

namespace App\controllers;

use App\models\ModelAvis;
use App\models\ModelRestaurant;
use App\Utils\StringFormatter;
use App\vues\Vue;


class CtrlRestaurant
{
    use StringFormatter;

    public function afficherRestaurant($id)
    {
        $id = (int)htmlspecialchars($id);
        $restaurantModel = new ModelRestaurant();
        $restaurant = $restaurantModel->getRestaurantByID($id);

        if ($restaurant) {
            $restaurant->telephone = "0" . $restaurant->telephone;

            $avisModel = new ModelAvis();
            $avis = $avisModel->getAvisByRestaurantID($id);

            $vue = new Vue('restaurant');
            $donneesVue = [
                'titre' => 'Detail restaurant ' . $restaurant->nom,
                'restaurant' => $restaurant,
                'avis' => $avis,
            ];
            $vue->afficher($donneesVue);
        } else {

            $vue = new Vue("erreur");
            $e = (object)array(
                'code' => 404,
                'description' => 'Restaurant not found.'
            );
            $vue->afficher(array('e' => $e));
        }
    }

}

