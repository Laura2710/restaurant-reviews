<?php

namespace App\models;

class ModelRestaurant extends DB
{
    public function getAllRestaurants()
    {
        $sql = "SELECT * FROM restaurants";
        return $this->query($sql);
    }

    public function getRestaurantByID($idRestaurant)
    {
        $sql = "SELECT * FROM restaurants WHERE idRestaurant = :idRestaurant";
        return $this->querySingle($sql, [':idRestaurant' => $idRestaurant]);
    }
}
