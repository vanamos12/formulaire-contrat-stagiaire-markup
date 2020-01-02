<?php
    include "db.php";

    $errors = "";
    $succesInscription = "";

    function validateInscription($mandattachesstagiaire){
        $errors = "<ul class='red'>";
        if (strcmp($mandattachesstagiaire, "")==0){
            $errors .= "<li>Le mandat du stagiaire ne doit pas être vide.</li>";
        }
        $errors .= "</ul>";
        return $errors;
    }
    if (isset($_POST["soumettre"])){
        $mandattachesstagiaire = $_POST["mandattachesstagiaire"];
        
        $errors = validateInscription($mandattachesstagiaire);
        if (strcmp($errors, "<ul class='red'></ul>") == 0){
            // We safeguard information in the database
            
            $stmt = $connection->prepare("INSERT INTO partiecsuperviseur(idContrat, mandattachesstagiaire) 
                                                VALUES(:idContrat, :mandattachesstagiaire)");
            
            $data = [
                "idContrat"=>$_SESSION["etape"]["idContrat"],
                "mandattachesstagiaire"=>$mandattachesstagiaire
            ];
            if ($stmt->execute($data)){
                $succesInscription = "<p class='green'>Enregistrement effectué!</p>";
                header("location:continuerremplircontratstage.php");
            }else{
                $succesInscription = "<p class='red'>Echec de l'enregistrement, veuillez réessayer.</p>"; 
            }
            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Contrat de stage Markup</title>
</head>
<body>
<div class="container">
        <?php
            include "include/banner.php"
        ?>
        <div class="title">
            <h1>Contrat de stage</h1>
            <h2>Partie C - Mandat et tâches du stagiaire</h2>
        </div>
        <div class="inscription-form">
            <form action="" method="POST">
                <div class="form-group">
                    <label>  
                        Mandats et t&acirc;ches du stagiaire
                    </label>
                    <textarea class="form-control" name="mandattachesstagiaire" rows="10" cols="25"></textarea>
                </div> 
                <div>
                    <?php  echo $errors; ?>
                </div>
                <div>
                    <?php echo $succesInscription; ?>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Soumettre" name="soumettre" />
                    <input class="btn btn-light" type="reset" value="Annuler" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>