<?php

namespace App\models;

use App\vues\Vue;
use Exception;
use PDO;
use PDOException;

abstract class DB
{


    private $pdo = null;


    public function __construct()
    {
        $config = require './configDB/config.php';

        if (!is_array($config)) {
            var_dump($config); // Ajout pour debug
            throw new Exception("La configuration n'est pas valide.");
        }

        $host = $config['db_host'];
        $db = $config['db_name'];
        $user = $config['db_user'];
        $pass = $config['db_pass'];

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $vue = new Vue("erreur");
            $e = (object)array(
                'code' => 500,
                'description' => "Connexion impossible",);
            $vue->afficher(array('e' => $e));
            die();
        }
    }

    protected function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    protected function querySingle($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}

?>
