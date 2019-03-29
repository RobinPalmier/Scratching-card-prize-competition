<?php
/**
 * Permets de sécuriser une chaîne de caractères.
 *
 * @param String $string : Variable de la chaîne a sécurisé.
 *
 * @return String.
*/
function str_secure($string){
    return trim(htmlspecialchars($string, ENT_QUOTES));
}

/**
 * Debug plus lisible des différents tableaux.
 *
 * @param Array $e : Variable du tableau.
 *
 * @return Array.
*/
function debug($e){
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

/**
 * Vérification des champs de type texte.
 *
 * @param String $var : Variable du champ texte.
 * @param String $champName : Nom du champ.
 *
 * @return String.
*/
function verifChampText($var, $champName){
    global $erreur;

    if(empty($var)){
        $erreur .= "<div class='erreur-form'>Vous n'avez pas renseigner de {$champName}.</div>";
    }
    else if(strlen($var) > 150 || strlen($var) < 3){
        $erreur .= "<div class='erreur-form'>Votre {$champName} doit contenir entre 3 et 150 caractères.</div>";
    }
    else if(!preg_match('#([a-zA-Zà-ÿ\-])#', $var)){
        $erreur .= "<div class='erreur-form'>Seul les caractères de A à Z, ainsi que les tirets sont accepté pour ce champ.</div>";
    }

    return $erreur;
}

/**
 * Vérification des champs de type e-mail.
 *
 * @param String $mail : Variable de l'adresse e-mail.
 *
 * @return String.
*/
function verifChampEmail($mail){
    global $erreur;
    global $db;

    $invalidMail = array('@yopmail.com','@laposte.net','@armyspy.com','@cuvox.de','@dayrep.com','@einrot.com','@fleckens.hu','@gustr.com','@jourrapide.com','@rhyta.com','@superrito.com','@teleworm.us','@boximail.com','@boximail.com','@boximail.com','@boximail.com','@boximail.com','@boximail.com','@getairmail.com','@zetmail.com','@vomoto.com','@clrmail.com','@vmani.com','@emlhub.com','@mozej.com','@carins.io','@goooomail.com','@ziyap.com','@sharklasers.com','@guerrillamail.info','@grr.la','@guerrillamail.biz','@guerrillamail.com','@guerrillamail.de','@guerrillamail.net','@guerrillamail.org','@guerrillamailblock.com','@guerrillamailblock.com','@spam4.me');

    if(empty($mail)){
        $erreur .= "<div class='erreur-form'>Vous n'avez pas indiqué d'email.</div>";
    }
    else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$mail)){
        $erreur .= "<div class='erreur-form'>Le format de votre adresse email n'est pas valdie.</div>";
    }
    else{
        foreach($invalidMail as $value){
            if(stripos($mail, $value)){
                $erreur .= "<div class='erreur-form'>Vous ne pouvez pas nous écrire avec cette adresse email.</div>";
            }
            else{
                $reqEmail = $db->prepare("SELECT * FROM participant WHERE email = '{$mail}'");
                $reqEmail->execute();
                $emailExist = $reqEmail->rowCount();

                if($emailExist != 0){
                    $erreur .="<div class='erreur-form'>L'adresse email est déjà utilisé par un utilisateur.</div>";
                    break;
                }
            }
        }
    }

    return $erreur;
}

/**
 * Vérification du captcha.
 *
 * @param Array $var : Variable du captcha.
 *
 * @return String.
*/
function verifCaptcha($var){
    global $erreur;

    if(empty($var)){
        $erreur .= "<div class='erreur-form'>Vous n'avez rempli le champ captcha.</div>";
    }
    else if($var != $_SESSION['captcha']){
        $erreur .= "<div class='erreur-form'>Le captcha est invalide.</div>";
    }

    return $erreur;
}

/**
 * Fonction permettant de générer un certain nombre de cartes aléatoirement.
 *
 * @param Number $nbCard : Nombre de carte que l'on souhaite.
 * @param Number $maxVal : Valeur maximum des cartes.
 *
 * @return Array
*/
function generateCards($nbCard, $maxVal){
    for($i=0;$i<$nbCard;$i++){
        $cards[$i] = rand(0,$maxVal);
    }
    $filter = array_unique($cards);
    if(count($filter) === $nbCard){
        return $filter;
    }
    else{
        return generateCards($nbCard, $maxVal);
    }
}
