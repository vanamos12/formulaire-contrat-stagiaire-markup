<?php
    include "db.php";
    $errors = "";
    $succesInscription = "";

    

    function getExtension($file){
        return substr($file, strrpos($file, ".")+1);
    }

    function validateInscription($diplome, $photo44, $cv, $message){
        $errors = "<ul class='red'>";
        if (!in_array(getExtension($diplome), AUTHORIZED_EXTENSION_FILES_DOCUMENTS)){
            $errors .= "<li>Le diplôme doit être un document PDF ou Microsoft Word.</li>";
        }
        if (!in_array(getExtension($photo44), AUTHORIZED_EXTENSION_FILES_IMAGE)){
            $errors .= "<li>Le photo doit avoir une des extensions : pdf, jpg, png, jpeg, gif, webp </li>";
        }
        if (!in_array(getExtension($cv), AUTHORIZED_EXTENSION_FILES_DOCUMENTS)){
            $errors .= "<li>Le CV doit être un document PDF ou Microsoft Word.</li>";
        }
        if (strcmp($message, "") == 0){
            $errors .= "<li>Le message ne doit pas être vide.</li>";
        }
        $errors .= "</ul>";
        return $errors;
    }

    if (isset($_POST["soumettre"])){
        $message = $_POST["message"];
        $diplome = $_FILES["diplomepluseleve"]["name"];
        $photo44= $_FILES["photo44"]["name"];
        $cv = $_FILES["cv"]["name"];
       
        $errors = validateInscription($diplome, $photo44, $cv, $message);
        if (strcmp($errors, "<ul class='red'></ul>") == 0){

            $random_number = mt_rand();
            $cheminDiplome = "files/diplome/" . $random_number . $_FILES["diplomepluseleve"]["name"];
            move_uploaded_file($_FILES["diplomepluseleve"]["tmp_name"], $cheminDiplome);

            $cheminPhoto44= "files/photo44/" . $random_number . $_FILES["photo44"]["name"];
            move_uploaded_file($_FILES["photo44"]["tmp_name"], $cheminPhoto44);

            $cheminCv= "files/cv/" . $random_number . $_FILES["cv"]["name"];
            move_uploaded_file($_FILES["cv"]["tmp_name"], $cheminCv);

            $succesInscription = "<p class='green'>Enregistrement effectué.</p>";
            /*
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
            */
        }
    }
    /*
    if (strcmp($_FILES["image"]["name"], "") == 0){
        $Photo = $_POST["Photo"];
    }

    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    $random_number = mt_rand();
    $Photo = "upload/" . $random_number . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $Photo);
    */
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
        <?php
            include "include/banner.php"
        ?>
        <div class="title">
            <h1>MARKUP CONSULTING</h1>
            <h2>Pécision des documents</h2>
        </div>
        <div class="inscription-form">
            <form action="" enctype="multipart/form-data" method="POST">
                <small class="text-muted">Les formats de fichiers accept&eacute;s sont : pdf, doc, docx, jpg, png, jpeg, gif, webp</small>
                <div class="form-group">
                    <label>Dipl&ocirc;me le plus élévé</label>
                    <input type="file" name="diplomepluseleve" required/>
                </div>
                <div class="form-group">
                    <label>Photo 4*4 récente</label>
                    <input type="file" name="photo44" required/>
                </div>
                <div class="form-group">
                    <label>Curriculum Vitae</label>
                    <input type="file" name="cv" required/>
                </div>
                <div class="form-group">
                    <label>Message (Lettre de motivation)</label>
                    <textarea class="form-control" rows="5" name="message" required></textarea>
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