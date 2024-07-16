<?php

namespace App\vues;

class Vue
{
    private $action;
    private $titre;

    public function __construct($action)
    {
        $this->action = $action;
        $this->titre = '';
    }

    public function afficher(array $donnees)
    {
        // Déterminer le chemin du fichier de vue en fonction de l'action
        if ($this->action === 'restaurant') {
            $cheminVue = "./vues/vueRestaurant.php";
        } elseif ($this->action === 'erreur') {
            $cheminVue = "./vues/vueErreur.php";
        } else {
            $cheminVue = "./vues/vueAccueil.php";
        }

        // Insérer les données dans le fichier de vue
        $contenuVue = $this->insererDonnees($cheminVue, $donnees);

        // Préparer les données pour le gabarit
        if (isset($donnees['titre'])) {
            $this->titre = $donnees['titre'];
        }

        $donneesGabarit = [
            'titrePage' => $this->titre,
            'contenu' => $contenuVue
        ];

        // Afficher la vue finale en insérant les données dans le gabarit
        echo $this->insererDonnees("./vues/gabarit.php", $donneesGabarit);
    }

    private function insererDonnees(string $cheminFichier, array $donnees = null)
    {
        if ($donnees === null) {
            ob_start();
            require_once $cheminFichier;
            return ob_get_clean();
        } else {
            extract($donnees);
            ob_start();
            require_once $cheminFichier;
            return ob_get_clean();
        }
    }
}

?>
