<?php use App\controllers\CtrlRestaurant;?>

<h1><?= $restaurant->nom ?></h1>
<address>
    <i><?= $restaurant->adresse ?></i><br>
    <i><?= $restaurant->cp ?> <?= $restaurant->ville ?></i><br>
    <i><?= CtrlRestaurant::formatPhoneNumber($restaurant->telephone) ?></i><br>
</address>
<h2>Description</h2>
<p><?= $restaurant->description ?></p>

<h2>Avis</h2>
<?php foreach ($avis as $a): ?>
    <p><?= $a->auteur ?? 'anonyme' ?> : <?= CtrlRestaurant::displayStars($a->note) ?></p>
    <p><?= $a->commentaire ?></p>
<?php endforeach; ?>


