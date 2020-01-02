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
    function validateInscription($nom, $prenom, $adresse, $ville, $codepostal, $telephone, $email){
        $errors = "<ul class='red'>";
        if (strcmp($nom, "")==0){
            $errors .= "<li>Le nom ne doit pas être vide.</li>";
        }
        if (strcmp($prenom, "")==0){
            $errors .= "<li>Le prénom ne doit pas être vide.</li>";
        }
        if (strcmp($adresse, "")==0){
            $errors .= "<li>L'adresse ne doit pas être vide.</li>";
        }
        if (strcmp($ville, "")==0){
            $errors .= "<li>L'adresse ne doit pas être vide.</li>";
        }
        if (strcmp($codepostal, "")==0){
            $errors .= "<li>Le code postal ne doit pas être vide.</li>";
        }
        if (!validateEmail($email)){
            $errors .= "<li>L'adresse mail doit être valide.</li>";
        }
        if (!validateTelephone($telephone)){
            $errors .= "<li>Le téléphone doit être valide.</li>";
        }
        $errors .= "</ul>";
        return $errors;
    }
    if (isset($_POST["soumettre"])){
        $nom = $_POST["nomstagiaire"];
        $prenom = $_POST["prenomstagiaire"];
        $adresse = $_POST["adressestagiaire"];
        $ville = $_POST["villestagiaire"];
        $codepostal = $_POST["codepostalstagiaire"];
        $telephone = $_POST["telephonestagiaire"];
        $email = $_POST["emailstagiaire"];
        
        $errors = validateInscription($nom, $prenom, $adresse, $ville, $codepostal, $telephone, $email);
        if (strcmp($errors, "<ul class='red'></ul>") == 0){
            // We safeguard information in the database
            
            $stmt = $connection->prepare("INSERT INTO partiebstagiaire(idContrat, nomstagiaire, prenomstagiaire,
                                                                         adressestagiaire, villestagiaire, codepostalstagiaire,
                                                                         telephonestagiaire, emailstagiaire) 
                                                VALUES(:idContrat, :nomstagiaire, :prenomstagiaire,
                                                         :adressestagiaire, :villestagiaire, :codepostalstagiaire,
                                                         :telephonestagiaire, :emailstagiaire)");
            
            $data = [
                "idContrat"=>$_SESSION["etape"]["idContrat"],
                "nomstagiaire"=>$nom,
                "prenomstagiaire"=>$prenom,
                "adressestagiaire"=>$adresse,
                "villestagiaire"=>$ville,
                "codepostalstagiaire"=>$codepostal,
                "telephonestagiaire"=>$telephone,
                "emailstagiaire"=>$email
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
            <h2>Partie B - Identification du stagiaire</h2>
        </div>
        <div class="inscription-form">
            <form action="" method="POST">
                <div class="form-group">
                    <label>
                        Nom : 
                    </label>
                    <input class="form-control" type="text" name="nomstagiaire"/>
                </div>
                <div class="form-group">
                    <label>
                        Pr&eacute;nom :
                    </label> 
                    <input class="form-control" type="text" name="prenomstagiaire"/>
                </div>
                <div class="form-group">
                    <label>
                        Adresse : 
                    </label>
                    <input class="form-control" type="text" name="adressestagiaire"/>
                </div>
                <div class="form-group">
                    <label>
                        Ville : 
                    </label>
                    <input class="form-control" type="text" name="villestagiaire"/>
                </div>
                <div class="form-group">
                    <label>
                        Code postal : 
                    </label>
                    <input class="form-control" type="text" name="codepostalstagiaire"/>
                </div>
                <div class="form-group">
                    <label>
                        T&eacute;l&eacute;phone : 
                    </label>
                    <input class="form-control" type="text" name="telephonestagiaire"/>
                </div>
                <div class="form-group">
                    <label>
                        Adresse E-mail :   
                    </label>
                    <input class="form-control" type="email" name="emailstagiaire"/>
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