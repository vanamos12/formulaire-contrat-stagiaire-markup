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
            <form action="" method="POST">
                <small class="text-muted">Les formats de fichiers accept&eacute;s sont : pdf, jpg, png, jpeg, gif, webp</small>
                <div class="form-group">
                    <label>Dipl&ocirc;me le plus élévé</label>
                    <input class="form-control" type="file" name="diplomepluseleve"/>
                </div>
                <div class="form-group">
                    <label>Photo 4*4 récente</label>
                    <input class="form-control" type="file" name="photo44"/>
                </div>
                <div class="form-group">
                    <label>Curriculum Vitae</label>
                    <input class="form-control" type="file" name="cv"/>
                </div>
                <div class="form-group">
                    <label>Message (Lettre de motivation)</label>
                    <input class="form-control" type="file" name="message"/>
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