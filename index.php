<?php
// On inclus les fichiers principaux.
include_once '_config/config.php';
include_once '_config/db.php';

// On définit la page courante.
if(isset($_GET['page']) && !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
}
else{
    $page = 'participation';
}

// Array contenant toutes les pages de notre site.
$allPages = scandir('controllers/');

// Vérification de l'existence de la page.
if(in_array($page.'_controller.php', $allPages)){

    // Inclusion de la page
    include_once 'controllers/'.$page.'_controller.php';
    include_once 'models/'.$page.'_model.php';
    include_once 'views/'.$page.'_view.php';
}
else{
    // Sinon redirection vers la page 404.
    header('location:'.URL);
}