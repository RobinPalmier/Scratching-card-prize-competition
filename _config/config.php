<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ À enlever lors du déploiement
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', true);


// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', false);
session_start();


// --------------------------- //
//         VARIABLES           //
// --------------------------- //
$scratchCard = "";

// --------------------------- //
//         CONSTANTS           //
// --------------------------- //

// Pour fonctions d'inclusion PHP.
define("PATH_REQUIRE", substr($_SERVER['SCRIPT_FILENAME'], 0, -9));

// Pour les images, fichiers etc. (HTML).
define("PATH", substr($_SERVER['PHP_SELF'], 0, -9));

// Adapte le HTTP de façon automatique. (/gratte/ à retirer lors de la mise en production).
define('URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/gratte/');

// DataBase informations
define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "imagraph-scratch");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "");