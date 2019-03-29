<?php
include_once '../../../_config/config.php';
include_once '../../../_config/db.php';
include_once '../../../controllers/functions/function.php';

// On enregistre le gagnant en base de données.
if($_SESSION['user']['carte_gagnante'] !== null){
    $attributeWinner = $db->prepare("UPDATE `wincard` SET `participant_id` = ? WHERE `wincard`.`id_winCard` = ?");
    $attributeWinner->execute([$_SESSION['user']['id'],$_SESSION['user']['carte_gagnante']]);
}

?>