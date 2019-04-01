<?php
require('functions/function.php');

// Si la session n'est pas définie alors on redirige vers la page d'accueil.
if(empty($_SESSION['user'])){
    header('location:/gratte');
}

// On vérifie s'il y a toujours des lots à gagner.
$verifGame = $db->prepare("SELECT * FROM `wincard` WHERE participant_id = 0");
$verifGame->execute();
$valide = $verifGame->fetch();

// Si tous les lots ont été remporté, alors on affiche un message.
if($valide === false){
    $scratchCard .= "<p class='finish'>Tous les lots ont été gagné.</p>";
}
else{
    // Si l'utilisateur charge pour la première fois la page, alors on lui attribue des cartes.
    if(!isset($_SESSION['user']['reload'])){
        $_SESSION['user']['nombre'] = generateCards(3,100);
    }
    
    // On récupère ces cartes et on regarde si elles font partie des cartes gagnantes qui sont enregistrées en base de données.
    foreach($_SESSION['user']['nombre'] as $value){

        $recupCard = $db->prepare("SELECT * FROM `wincard` WHERE participant_id = 0 AND nombre = ?");
        $recupCard->execute([$value]);
        $donne = $recupCard->fetch();

        // S'il y a une carte gagnante parmi le tirage, alors on l'affiche.
        if($donne){
            $scratchCard .= "<scratch-card 
                      background='{$donne['image']}' 
                      foreground='assets/images/back.png'
                      data-card='win'
                      data-name='".$donne['lot']."'
                      percent=80
                      thickness=15
                      load></scratch-card>";

            // On sauvegarde la carte gagnante dans la session.
            $_SESSION['user']['carte_gagnante'] = $donne['id_winCard'];
        }
        // Sinon, on affiche par défaut une carte perdante.
        else{
            $scratchCard .= "<scratch-card 
                      background='assets/images/card_loose.png' 
                      foreground='assets/images/back.png'
                      data-card='loose'
                      percent=80
                      thickness=15
                      load></scratch-card>";
        }
    }

    // On sauvegarde le chargement de la page.
    $_SESSION['user']['reload'] = true;
}
?>