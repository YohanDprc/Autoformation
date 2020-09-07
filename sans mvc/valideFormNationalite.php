<?php
require_once("header.php");
require_once("connexionPDO.php");

$action = $_GET['action'];
$num = $_POST['num']; // Récupération du num du formulaire
$libelle = $_POST['libelle']; // Récupération du libellé du formulaire
$continent = $_POST['continent']; // Récupération du continent du formulaire

if ($action == "Modifier") {
    $req = $monPdo->prepare("UPDATE nationalite SET libelle = :libelle, numContinent = :continent WHERE num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
} elseif ($action == "Ajouter") {
    $req = $monPdo->prepare("INSERT INTO nationalite(libelle, numContinent) VALUES(:libelle, :continent)");
    $req->bindParam(":libelle", $libelle);
    $req->bindParam(':continent', $continent);
}
$nb = $req->execute();
$message = $action == "Modifier" ? "modifié" : "ajoutée";

echo '<div class="container mt-5">';
echo    '<div class="row">
    <div class="col mt-4">';
if ($nb == 1) {
    echo '<div class="alert alert-success" role="alert">
    La nationalité a bien été ' . $message . '!
</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
    La nationalité n\'a pas été '. $message . '!
</div>';
}
?>
</div>
</div>
<a href="listeNationalites.php" class="btn btn-primary">Revenir à la liste des nationalitées</a>
</div>

<?php
require_once("footer.php");
?>