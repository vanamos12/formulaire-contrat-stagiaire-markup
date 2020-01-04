<?php 
    include "db.php";
    $successConnexion = "";

    if (isset($_POST["soumettre"])){
        $email = $_POST['email'];
        $password = $_POST['motdepasse'];
        $stmt = $connection->prepare("SELECT * FROM utilisateurs where email=:email AND motdepasse=:motdepasse");
        $data = [
            "email" => $email,
            "motdepasse" => md5($password)
        ];
        $stmt->execute($data);
        if ($row = $stmt->fetch()){
            $_SESSION['utilisateur'] = $row;
            if (strcmp($row['poste'], SUPERADMINISTRATEUR) == 0){
                $successConnexion = "<p class='green'>Utilisateur superadmnistrateur detecté.</p>";
                //$_SESSION['poste'] = "superadministrateur";
                header("location:validatesuperviseurs.php");
            }else if(strcmp($row['poste'], STAGIAIRE)==0){
                $successConnexion = "<p class='green'>Utilisateur stagiaire detecté.</p>";
                //$_SESSION['poste'] = "stagiaire";
                header("location:listecontratstagiaire.php");
            }else if (strcmp($row['poste'], SUPERVISEUR)==0){
                if (strcmp($row['valide'], "oui") == 0){
                    header("location:listecontratsuperviseur.php");
                }else{
                    $successConnexion = "<p class='red'>Demandez au directeur général de vous valider en premier lieu.</p>";
                }
            }
        }else{
            $successConnexion = "<p class='red'>Aucun utilisateur trouvé.</p>";
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
            <h2>Connexion</h2>
        </div>
        <div class="inscription-form">
            <form action="" method="POST">
                <div class="form-group">
                    <label>
                        Email : 
                    </label>
                    <input class="form-control" type="text" name="email" />
                </div>
                <div class="form-group">
                    <label>
                        Mot de passe : 
                    </label>
                    <input class="form-control" type="password" name="motdepasse" />
                </div>
                <div>
                    <?php echo $successConnexion; ?>
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