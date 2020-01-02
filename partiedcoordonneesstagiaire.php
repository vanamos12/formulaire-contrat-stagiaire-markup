<?php
    include "db.php";

    $errors = "";
    $succesInscription = "";

    function validateInscription($dureetotalestage, $datedebutstage, $datefinstage, $lieustage, $horairessemainestage, $horairesjourneestage, $periodesinterruptionstage){
        $errors = "<ul class='red'>";
        if (strcmp($dureetotalestage, "")==0){
            $errors .= "<li>La durée totale de stage ne doit pas être vide.</li>";
        }
        if (strcmp($datedebutstage, "")==0){
            $errors .= "<li>La date de début de stage doit être une date valide.</li>";
        }
        if (strcmp($datefinstage, "")==0){
            $errors .= "<li>La date de fin de stage doit être une date valide.</li>";
        }
        if (strcmp($lieustage, "")==0){
            $errors .= "<li>Le lieu de stage ne doit pas être vide.</li>";
        }
        if (strcmp($horairessemainestage, "")==0){
            $errors .= "<li>L'horaire de la semaine ne doit pas être vide.</li>";
        }
        if (strcmp($horairesjourneestage, "")==0){
            $errors .= "<li>L'horaire de la journée ne doit être vide.</li>";
        }
        
        $errors .= "</ul>";
        return $errors;
    }
    if (isset($_POST["soumettre"])){
        $dureetotalestage = $_POST["dureetotalestage"];
        $datedebutstage = $_POST["datedebutstage"];
        $datefinstage = $_POST["datefinstage"];
        $lieustage = $_POST["lieustage"];
        $horairessemainestage = $_POST["horairessemainestage"];
        $horairesjourneestage = $_POST["horairesjourneestage"];
        $periodesinterruptionstage = $_POST["periodesinterruptionstage"];
        
        $errors = validateInscription($dureetotalestage, $datedebutstage, $datefinstage, $lieustage, $horairessemainestage, $horairesjourneestage, $periodesinterruptionstage);
        if (strcmp($errors, "<ul class='red'></ul>") == 0){
            // We safeguard information in the database
            
            $stmt = $connection->prepare("INSERT INTO partiedstagiaire(idContrat, dureetotalestage, datedebutstage,
                                                                         datefinstage, lieustage, horairessemainestage,
                                                                         horairesjourneestage, periodesinterruptionstage) 
                                                VALUES(:idContrat, :dureetotalestage, :datedebutstage,
                                                         :datefinstage, :lieustage, :horairessemainestage,
                                                         :horairesjourneestage, :periodesinterruptionstage)");
            
            $data = [
                "idContrat"=>$_SESSION["etape"]["idContrat"],
                "dureetotalestage"=>$dureetotalestage,
                "datedebutstage"=>$datedebutstage,
                "datefinstage"=>$datefinstage,
                "lieustage"=>$lieustage,
                "horairessemainestage"=>$horairessemainestage,
                "horairesjourneestage"=>$horairesjourneestage,
                "periodesinterruptionstage"=>$periodesinterruptionstage
            ];
            if ($stmt->execute($data)){
                $succesInscription = "<p class='green'>Enregistrement  effectué!.</p>";
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
            <h2>Partie D - Coordonn&eacute;es du stage</h2>
        </div>        
        <div class="inscription-form">
            <form action="" method="POST">
                <div class="form-group">
                    <label>
                        Dur&eacute;e totale du stage (en mois): 
                    </label>
                    <input class="form-control" type="text" name="dureetotalestage"/>
                </div>
                <div class="form-group">
                    <label>
                        D&eacute;but de stage (JJ-MM-YYYY) : 
                    </label>
                    <input class="form-control" type="text" name="datedebutstage"/>
                </div>
                <div class="form-group">
                    <label>
                        Fin du stage (JJ-MM-YYYY): 
                    </label>
                    <input class="form-control" type="text" name="datefinstage"/>
                </div>
                <div class="form-group">
                    <label>
                        Lieu du stage :
                    </label>
                    <input class="form-control"  type="text" name="lieustage"/>
                </div>
                <div class="form-group">
                    <label>
                        Horaires de la semaine : 
                    </label>
                    <textarea class="form-control" name="horairessemainestage" id="horairessemainestage" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        Horaires de la journ&eacute;e : 
                    </label>
                    <textarea class="form-control" name="horairesjourneestage" id="horairesjourneestage" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        P&eacute;riode int&eacute;rruption pr&eacute;vue : 
                    </label>
                    <textarea class="form-control" name="periodesinterruptionstage" id="periodesinterruptionstage" cols="30" rows="3"></textarea>
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