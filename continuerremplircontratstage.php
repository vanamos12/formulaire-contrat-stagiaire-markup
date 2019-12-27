<?php 
    include "db.php";
    if (isset($_GET['id'])){
        $idContrat = $_GET['id'];
        $poste = $_GET['poste'];
        $stmt = null;

        if (strcmp($poste, "stagiaire") == 0){
            $stmt = $connection->prepare("SELECT * FROM etapes 
                                                JOIN contratstagiaires
                                                ON  contratstagiaires.etape = etapes.idEtape 
                                                AND contratstagiaires.idContrat=:idcontrat
                                            ");
        }
        if (strcmp($poste, "superviseur") == 0){
            $stmt = $connection->prepare("SELECT * FROM etapes 
                                                JOIN contratstagiaires
                                                ON  contratstagiaires.etapesuperviseur = etapes.idEtape 
                                                AND contratstagiaires.idContrat=:idcontrat
                                            ");
        }
        $stmt->execute(["idcontrat"=>$idContrat]);
        $row = $stmt->fetch();
        $_SESSION["etape"] = $row;
        header("location:".$row['actualpage']);
    }else{
        $idNextEtape = $_SESSION["etape"]["idNextEtape"];
        if ($idNextEtape != 0){
            // Ce n'est pas la fin d'une série de formulaire
            $stmt = $connection->prepare("SELECT * from etapes
                                        WHERE idEtape=:idetape");
            $stmt->execute(["idetape"=>$idNextEtape]);
            $row = $stmt->fetch();
            $_SESSION["etape"]["idEtape"] = $row["idEtape"];
            $_SESSION["etape"]["categorie"] = $row["categorie"];
            $_SESSION["etape"]["actualpage"] = $row["actualpage"];
            $_SESSION["etape"]["nextpage"] = $row["nextpage"];
            $_SESSION["etape"]["idNextEtape"] = $row["idNextEtape"];

            // We indicate that we go at another stage
            $sql = null;
            $poste = $_SESSION["etape"]["categorie"]; 
            if (strcmp($poste, "stagiaire")==0){
                $sql = $connection->prepare("UPDATE contratstagiaires 
                                            SET etape=:etape
                                            WHERE idContrat=:idcontrat");
            }
            if (strcmp($poste, "superviseur")==0){
                $sql = $connection->prepare("UPDATE contratstagiaires 
                                            SET etapesuperviseur=:etape
                                            WHERE idContrat=:idcontrat");
            }
            
            $sql->execute(["etape"=>$row["idEtape"], "idcontrat"=>$_SESSION["etape"]["idContrat"]]);
            header("location:".$row["actualpage"]);
        }else{
            // C'est la fin d'une série de formulaire
            $poste = $_SESSION["etape"]['categorie'];
            if (strcmp($poste, "stagiaire") == 0){

            }

            if (strcmp($poste, "superviseur") == 0){

            }

            // we delete session of etape

            // we update the status of the contract
        }
        

    }
    

?>