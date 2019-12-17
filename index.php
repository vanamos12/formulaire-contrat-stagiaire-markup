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
            $_SESSION['idUtilisateur'] = $row['idUtilisateur'];
            if (strcmp($row['poste'], "superadministrateur") == 0){
                $successConnexion = "<p class='green'>Utilisateur superadmnistrateur detecté.</p>";
                $_SESSION['poste'] = "superadministrateur";
                header("location:validatesuperviseurs.php");
            }else if(strcmp($row['poste'], "stagiaire")==0){
                $successConnexion = "<p class='green'>Utilisateur stagiaire detecté.</p>";
                $_SESSION['poste'] = "stagiaire";
                header("location:listecontratstagiaire.php");
            }
        }else{
            $successConnexion = "<p class='red'>Aucun utilisateur trouvé.</p>";
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