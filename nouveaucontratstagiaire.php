<?php 
    include "db.php";

    $increment = $connection->prepare("SELECT AUTO_INCREMENT FROM information_schema.TABLES
                                        WHERE TABLE_SCHEMA=:tableschema AND TABLE_NAME=:tablename");
    $increment->execute(["tableschema"=>"stagiairemarkup", "tablename"=>"contratstagiaires"]);
    $row = $increment->fetch();

    $idContrat = $row["AUTO_INCREMENT"];

    $stmt = $connection->prepare("INSERT INTO 
        contratstagiaires(idStagiaire, nomcontrat, statut, etape, etapesuperviseur)
        VALUES(:idUtilisateur, :nomcontrat, :statut, :etape, :etapesuperviseur)");
    
    $data = [
        "idUtilisateur"=>$_SESSION['utilisateur']['idUtilisateur'],
        "nomcontrat"=>$_SESSION['utilisateur']['nom']." - ".$idContrat,
        "statut"=>"En attente stagiaire",
        "etape"=>BEGIN_ETAPE_STAGIAIRE,
        "etapesuperviseur"=>BEGIN_ETAPE_SUPERVISEUR
    ];
    $stmt->execute($data);

    header("location:listecontratstagiaire.php");

?>