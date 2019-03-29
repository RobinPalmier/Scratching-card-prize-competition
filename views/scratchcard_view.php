<!-- HEAD & HEADER -->
<?php include_once 'views/inc/head.php'; ?>
<?php include_once 'views/inc/header.php'; ?>

<div class="content content-scratch">
    <h2>Voici votre tirage :</h2>
    <h3>Veuillez gratter les cartes à l'aide de votre souris.</h3>

    <div class="content-gratte">
        <?= $scratchCard; ?>
    </div>
    <div id="resultat-grattage"></div>
</div>
<!-- FOOTER -->
<?php include_once 'views/inc/footer.php'; ?>


