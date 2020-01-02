<?php
    include "db.php";
    
    $errors = "";
    $succesInscription = "";

    function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }
    function validateTelephone($telephone){
        if (!preg_match("/^[0-9]+$/", $telephone)){
            return false;
        }
        return true;
    }
    function validateInscription($nomresponsable, $titreresponsable, $adresseresponsable, 
                                $villeresponsable, $telephoneresponsable, $emailresponsable, 
                                $nomsuperviseur, $titresuperviseur, $telephonesuperviseur, 
                                $emailsuperviseur){
        $errors = "<ul class='red'>";
        if (strcmp($nomresponsable, "")==0){
            $errors .= "<li>Le nom du responsable ne doit pas être vide.</li>";
        }
        if (strcmp($titreresponsable, "")==0){
            $errors .= "<li>Le titre du responsable ne doit pas être vide.</li>";
        }
        if (strcmp($adresseresponsable, "")==0){
            $errors .= "<li>L'adresse du responsable ne doit pas être vide.</li>";
        }
        if (strcmp($villeresponsable, "")==0){
            $errors .= "<li>La ville du responsable ne doit pas être vide.</li>";
        }
        if (!validateTelephone($telephoneresponsable)){
            $errors .= "<li>Le téléphone du responsable doit être valide.</li>";
        }
        if (!validateEmail($emailresponsable)){
            $errors .= "<li>L'adresse mail du responsable doit être valide.</li>";
        }
        if (strcmp($nomsuperviseur, "")==0){
            $errors .= "<li>Le nom du superviseur ne doit pas être vide.</li>";
        }
        if (strcmp($titresuperviseur, "")==0){
            $errors .= "<li>Le titre du superviseur ne doit pas être vide.</li>";
        }
        if (!validateTelephone($telephonesuperviseur)){
            $errors .= "<li>Le téléphone du superviseur doit être valide.</li>";
        }
        if (!validateEmail($emailsuperviseur)){
            $errors .= "<li>L'adresse mail du superviseur doit être valide.</li>";
        }

        $errors .= "</ul>";
        return $errors;
    }
    if (isset($_POST["soumettre"])){
        $nomresponsable = $_POST["nomresponsable"];
        $titreresponsable = $_POST["titreresponsable"];
        $adresseresponsable = $_POST["adresseresponsable"];
        $villeresponsable = $_POST["villeresponsable"];
        $telephoneresponsable = $_POST["telephoneresponsable"];
        $emailresponsable = $_POST["emailresponsable"];

        $nomsuperviseur = $_POST["nomsuperviseur"];
        $titresuperviseur = $_POST["titresuperviseur"];
        $telephonesuperviseur = $_POST["telephonesuperviseur"];
        $emailsuperviseur = $_POST["emailsuperviseur"];
        
        
        $errors = validateInscription($nomresponsable, $titreresponsable, $adresseresponsable, $villeresponsable, $telephoneresponsable, $emailresponsable, $nomsuperviseur, $titresuperviseur, $telephonesuperviseur, $emailsuperviseur);
        if (strcmp($errors, "<ul class='red'></ul>") == 0){
            // We safeguard information in the database
            
            $stmt = $connection->prepare("INSERT INTO partieasuperviseur(idContrat, nomresponsable, titreresponsable,
                                                                         adresseresponsable, villeresponsable, telephoneresponsable,
                                                                         emailresponsable, nomsuperviseur, titresuperviseur,
                                                                         telephonesuperviseur, emailsuperviseur) 
                                                VALUES(:idContrat, :nomresponsable, :titreresponsable,
                                                         :adresseresponsable, :villeresponsable, :telephoneresponsable,
                                                         :emailresponsable, :nomsuperviseur, :titresuperviseur,
                                                         :telephonesuperviseur, :emailsuperviseur)");
            
            $data = [
                "idContrat"=>$_SESSION["etape"]["idContrat"],
                "nomresponsable"=>$nomresponsable,
                "titreresponsable"=>$titreresponsable,
                "adresseresponsable"=>$adresseresponsable,
                "villeresponsable"=>$villeresponsable,
                "telephoneresponsable"=>$telephoneresponsable,
                "emailresponsable"=>$emailresponsable,
                "nomsuperviseur"=>$nomsuperviseur,
                "titresuperviseur"=>$titresuperviseur,
                "telephonesuperviseur"=>$telephonesuperviseur,
                "emailsuperviseur"=>$emailsuperviseur,
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
    <title>Formulaire d'enregistrement du stagiaire.</title>
</head>
<body>
    <div class="container">
        <?php
            include "include/banner.php"
        ?>
        <div class="title">
            <h1>Contrat de stage</h1>
            <h2>Partie A - Identification de l'entreprise</h2>
        </div>
        <div class="inscription-form">
            <form action="" method="POST">
                <h3>Nom de l'entreprise : <strong>MARKUP CONSULTING</strong></h3>
                <div class="form-group">
                    <label>
                        Responsable : 
                    </label>
                    <input class="form-control" type="text" name="nomresponsable"/>
                </div>
                <div class="form-group">
                    <label>
                        Titre Responsable: 
                    </label>
                    <input class="form-control" type="text" name="titreresponsable"/>
                </div>
                <div class="form-group">
                    <label>
                        Adresse Responsable: 
                    </label>
                    <input class="form-control" type="text" name="adresseresponsable"/>
                </div>
                <div class="form-group">
                    <label>
                        Ville Responsable: 
                    </label>
                    <input class="form-control" type="text" name="villeresponsable"/>
                </div>
                <div class="form-group">
                    <label>
                        T&eacute;l&eacute;phone Responsable: 
                    </label>
                    <input class="form-control" type="text" name="telephoneresponsable"/>
                </div>
                <div class="form-group">
                    <label>
                        Adresse E-mail Responsable: 
                    </label>
                    <input class="form-control" type="email" name="emailresponsable"/>
                </div>
                <div class="form-group">
                    <label>
                        Superviseur du stagiaire : 
                    </label>
                    <input class="form-control" type="text" name="nomsuperviseur"/>
                </div>
                <div class="form-group">
                    <label>
                        Titre Superviseur: 
                    </label>
                    <input class="form-control" type="text" name="titresuperviseur"/>
                </div>
                <div class="form-group">
                    <label>
                        T&eacute;l&eacute;phone Superviseur: 
                    </label>
                    <input class="form-control" type="text" name="telephonesuperviseur"/>
                </div>
                <div class="form-group">
                    <label>
                        Adresse E-mail Superviseur: 
                    </label>
                    <input class="form-control" type="email" name="emailsuperviseur"/>
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