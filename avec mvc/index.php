<?php session_start(); ?>

<?php
require_once("vues/header.php");

$uc = empty($_GET["uc"]) ? "accueil" : $_GET["uc"];

switch ($uc) {
    case 'accueil':
        require_once("vues/accueil.php");
        break;
    case 'continents':
        break;
}

require_once("vues/footer.php");
?>