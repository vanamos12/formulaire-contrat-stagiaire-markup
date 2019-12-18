<?php 
    include "db.php";

    $stmt = $connection->prepare("INSERT INTO 
        contratstagiaires(idStagiaire, nomcontrat, statut, etape)
        VALUES(:idUtilisateur, :nomcontrat, :statut, :etape)");
    $idContrat = 1;
    $data = [
        "idUtilisateur"=>$_SESSION['utilisateur']['idUtilisateur'],
        "nomcontrat"=>$_SESSION['utilisateur']['nom']." - ".$idContrat,
        "statut"=>"En attente stagiaire",
        "etape"=>1
    ];
    $stmt->execute($data);

    header("location:listecontratstagiaire.php");

?>