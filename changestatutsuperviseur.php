<?php 

include('db.php');

$id=$_GET['id'];
$valide = $_GET['statut'];
if (strcmp($valide, "oui")==0){
    $valide = "non";
}else{
    $valide = "oui";
}

$query = $connection->prepare("UPDATE utilisateurs set valide=:valide where idUtilisateur=:id");

$query->execute(["id"=>$id, "valide"=>$valide]);

header('location:validatesuperviseurs.php');

?>