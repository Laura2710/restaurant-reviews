<?php

namespace App\models;

class ModelAvis extends DB
{
    public function getAvisByRestaurantID($idRestaurant)
    {
        $sql = "SELECT * FROM avis WHERE idRestaurant = :idRestaurant";
        return $this->query($sql, array(":idRestaurant" => $idRestaurant));
    }

}
