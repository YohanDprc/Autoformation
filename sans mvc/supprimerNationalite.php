<?php session_start();
require_once("connexionPDO.php");

$num = $_GET['num'];

$req = $monPdo->prepare("DELETE FROM nationalite WHERE num = :num");
$req->bindParam(':num', $num);
$nb = $req->execute();

if ($nb == 1) {
    $_SESSION['message'] = ["success"=>"La nationalité a bien été supprimée !"];
} else {
    $_SESSION['message'] = ["danger"=>"La nationalité n'a pas été supprimée !"];
}
header('Location: listeNationalites.php');
exit();
?>