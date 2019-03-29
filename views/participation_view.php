<!-- HEAD & HEADER -->
<?php include_once 'views/inc/head.php'; ?>
<?php include_once 'views/inc/header.php'; ?>

<div class="content content-home">
    <h2>Inscription</h2>
    <h3>Pour participer au jeu, vous devez vous inscrire : </h3>
    <div class="error"><?= $erreur ?></div>
    <form action="" method="post">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="email" name="email" placeholder="email">
        <img src="assets/images/captcha.php" alt="captcha-auth">
        <input type="text" name="captcha" placeholder="captcha">
        <input type="submit" name="submit" value="S'inscrire">
    </form>
</div>
<!-- FOOTER -->
<?php include_once 'views/inc/footer.php'; ?>
