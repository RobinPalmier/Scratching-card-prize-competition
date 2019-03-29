<?php
require('functions/function.php');

if(isset($_POST['submit']) && $_POST['submit'] === "S'inscrire"){
    extract($_POST);
    verifChampText(str_secure($_POST['nom']),"nom");
    verifChampText(str_secure($_POST['prenom']),"prénom");
    verifChampEmail(str_secure($_POST['email']));
    verifCaptcha(str_secure($_POST['captcha']));

    if(empty($erreur)){
        // On insère en base de données.
        $insert = $db->prepare("INSERT INTO participant(nom, prenom, email) VALUES(:nom, :prenom, :email)");
        $insert->execute([
            ':nom'      => str_secure($_POST['nom']),
            ':prenom'   => str_secure($_POST['prenom']),
            ':email'    => str_secure($_POST['email']),
        ]);

        // On récupère l'id de l'utilisateur.
        $recupId = $db->prepare("SELECT id_participant FROM `participant` WHERE email = ?");
        $recupId->execute([$_POST['email']]);
        $id = $recupId->fetch();
        

        // On définit la session.
        $_SESSION['user']['id'] = $id['id_participant'];
        $_SESSION['user']['nom'] = $_POST['nom'];
        $_SESSION['user']['prenom'] = $_POST['prenom'];
        $_SESSION['user']['email'] = $_POST['email'];

        // On redirige vers la page suivante.
        if(!empty($_SESSION['user'])){
            header('location:/gratte/scratchCard');
        }
    }
}
?>