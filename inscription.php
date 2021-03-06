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
    function validateInscription($nom, $email, $telephone, $motdepasse){
        $errors = "<ul class='red'>";
        if (strcmp($nom, "")==0){
            $errors .= "<li>Le nom ne doit pas être vide.</li>";
        }
        if (strcmp($motdepasse, "")==0){
            $errors .= "<li>Le mot de passe ne doit pas être vide.</li>";
        }
        if (!validateEmail($email)){
            $errors .= "<li>L'adresse mail doit être valide.</li>";
        }
        if (!validateTelephone($telephone)){
            $errors .= "<li>Le téléphone doit être une suite de chiffres.</li>";
        }
        $errors .= "</ul>";
        return $errors;
    }
    if (isset($_POST["soumettre"])){
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $motdepasse = $_POST["motdepasse"];
        $poste = $_POST["poste"];
        $telephone = $_POST["telephone"];
        $errors = validateInscription($nom, $email, $telephone, $motdepasse);
        if (strcmp($errors, "<ul class='red'></ul>") == 0){
            // We safeguard information in the database
            $stmt = $connection->prepare("INSERT INTO utilisateurs(nom, email, telephone, motdepasse, poste, valide) VALUES(:nom, :email, :telephone,:motdepasse, :poste, :valide)");
            $valide = "oui";
            if (strcmp($poste, "superviseur") == 0){
                $valide = "non";
            }
            $data = [
                "nom"=>$nom,
                "email"=>$email,
                "telephone"=>$telephone,
                "motdepasse"=>md5($motdepasse),
                "poste"=>$poste,
                "valide"=>$valide
            ];
            if ($stmt->execute($data)){
                $succesInscription = "<p class='green'>Inscription réussie, vous pouvez maitenant vous <a href='index.php'>connecter</a>.</p>";
            }else{
                $succesInscription = "<p class='red'>Echec de l'inscription, nous avons déjà cet email dans notre base.</p>"; 
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "include/head.php";
    ?>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Contrat de stage Markup</h1>
            <h2>Inscription</h2>
        </div>
        <div class="inscription-form">
            <form class="" action="" method="POST">
                <div class="form-group">
                    <label for="nom">
                        Nom : 
                    </label>
                    <input class="form-control" type="text" id="nom" name="nom" />
                </div>
                <div class="form-group">
                    <label for="email">
                        Email : 
                    </label>
                    <input class="form-control" id="email" type="text" name="email" />
                </div>
                <div class="form-group">
                    <label for="motdepasse">
                        Mot de passe : 
                    </label>
                    <input class="form-control" type="password" name="motdepasse" id="motdepasse" />
                    
                </div>
                <div class="form-group">
                    <label for="telephone">
                        T&eacute;l&eacute;phone : 
                    </label>
                    <input class="form-control" type="text" name="telephone" id="telephone" />
                    
                </div>
                <div class="form-group">
                    <label for="poste">
                        Poste :
                    </label>  
                    <select class="form-control" name="poste" id="poste">
                        <option value="stagiaire">stagiaire</option>
                        <option value="superviseur">superviseur</option>
                    </select>
                    
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
