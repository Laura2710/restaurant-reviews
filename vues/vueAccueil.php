<h1><?= $titre ?></h1>
<?php foreach ($restaurants as $r) : ?>
    <article>
        <h2>
            <a href="index.php?action=restaurant&idRestaurant=<?= htmlspecialchars($r->idRestaurant) ?>" title="Voir le détail du restaurant"><?= htmlspecialchars($r->nom) ?></a>
        </h2>
        <p><i><?= $r->ville ?></i></p>
        <p><?= $r->description ?></p>
    </article>
<?php endforeach; ?>

