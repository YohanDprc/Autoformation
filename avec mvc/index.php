<?php ob_start(); ?>
<?php session_start(); ?>
<?php
require_once("vues/header.php");
require_once("modeles/monPdo.php");
require_once("modeles/Continent.php");
require_once("vues/messageFlash.php");

$uc = empty($_GET["uc"]) ? "accueil" : $_GET["uc"];

switch ($uc) {
    case 'accueil':
        require_once("vues/accueil.php");
        break;
    case 'continents':
        require_once("controllers/continentController.php");
        break;
}

require_once("vues/footer.php");
?>