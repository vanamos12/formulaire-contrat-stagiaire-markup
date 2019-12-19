<?php 
    include "db.php";
    if (isset($_GET['id'])){
        $idContrat = $_GET['id'];

        $stmt = $connection->prepare("SELECT * FROM etapes 
                                            JOIN contratstagiaires
                                            ON  contratstagiaires.etape = etapes.idEtape 
                                            AND contratstagiaires.idContrat=:idcontrat
                                        ");
        $stmt->execute(["idcontrat"=>$idContrat]);
        $row = $stmt->fetch();
        $_SESSION["etape"] = $row;
        header("location:".$row['actualpage']);
    }else{
        $stmt = $connection->prepare("SELECT * from etapes
                                        WHERE idEtape=:idetape");
        $stmt->execute(["idetape"=>$_SESSION["etape"]["idNextEtape"]]);
        $row = $stmt->fetch();
        $_SESSION["etape"]["idEtape"] = $row["idEtape"];
        $_SESSION["etape"]["categorie"] = $row["categorie"];
        $_SESSION["etape"]["actualpage"] = $row["actualpage"];
        $_SESSION["etape"]["nextpage"] = $row["nextpage"];
        $_SESSION["etape"]["idNextEtape"] = $row["idNextEtape"];
        header("location:".$row["actualpage"]);

    }
    

?>