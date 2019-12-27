<?php
    include "db.php";

    if (isset($_POST['type'])){
        $type = $_POST['type'];
        if (strcmp($type, "stagiaire") == 0){
            $stmt = $connection->prepare("INSERT INTO signatures(poste, imageURL, idContrat)
                                                    VALUES(:poste, :imageURL, :idContrat)");
            $data = [
                "poste"=>$type,
                "imageURL"=>$_POST['image'],
                "idContrat"=>$_SESSION["etape"]["idContrat"]
            ];
            $stmt->execute($data);

            $dataToSend = ["status"=>"success", "poste"=>$type];
            
            echo json_encode($dataToSend, JSON_FORCE_OBJECT);
        }
        //header("location:continuerremplircontratstage.php");
    }