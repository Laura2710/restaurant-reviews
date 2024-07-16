# 🍽️ Restaurant Reviews

## 📜 Description
Ce mini-projet est un site web recensant des restaurants et les avis des internautes de ceux-ci. 
Il a été développé dans le cadre d'un devoir pour l'ENI et et vise à mettre en place une architecture MVC (Modèle-Vue-Contrôleur).

## 🛠️ Prérequis
- PHP 7.4 ou supérieur
- Composer
- Un serveur MySQL

## 🚀 Installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Laura2710/restaurant-reviews.git
   cd restaurant-reviews

2. **Installer les dépendances**
   ```bash
   composer install

3. **Configurer la base de données**
- Créez une base de données MySQL.
- Importez le fichier database.sql fourni pour créer les tables nécessaires.
- Configurez les informations de connexion à la base de données dans le fichier configDB/config.php.

Exemple de config.php :
  ```php
   return [
     'db_host' => 'votre_hote',
     'db_name' => 'nom_de_votre_base',
     'db_user' => 'votre_utilisateur',
     'db_pass' => 'votre_mot_de_passe'
   ];
  ``` 
## 📖 Utilisation
Démarrer votre serveur pour accéder au site 

## 🏠 Page d'Accueil
Affiche une liste de restaurants avec leurs détails de base.

## 📄 Détails d'un Restaurant
Cliquez sur un restaurant dans la liste pour voir ses détails complets et les avis des internautes.

## ⚠️ Gestion des Erreurs
Le site gère les erreurs courantes comme l'absence d'ID de restaurant ou la page introuvable.

## ✨ Fonctionnalités
- Lister tous les restaurants
- Afficher les détails d'un restaurant spécifique
- Afficher les avis associés à un restaurant
- Gérer les erreurs avec des pages d'erreur dédiées
