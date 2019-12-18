<?php
    include "db.php";
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
            <h1>Contrat de stage markup</h1>
            <h2>Liste des contrats stagiaires</h2>
        </div>
        <div class="list-contrats-stagiaires">
        <a href="nouveaucontratstagiaire.php" class="btn btn-success">Créer un nouveau contrat</a>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>

            <tr>

                <th>Nom Contrat</th>

                <th>Id Contrat</th>

                <th>Date Creation</th>

            <!--<th>Description</th>-->

                <th width="180">Statut</th>
                <th width="180">Action</th>

            </tr>

            </thead>



            <tbody>

            <?php

                $query = $connection->prepare("select * from contratstagiaires where idStagiaire=:idStagiaire");

                $query->execute(["idStagiaire"=>$_SESSION["utilisateur"]["idUtilisateur"]]);

                while($row = $query->fetch()){

                $id=$row['idContrat'];


            ?>
            
            <tr>
            
                <td><?php echo $row['nomcontrat']; ?></td>

                <td><?php echo $row['idContrat']; ?></td>

                <td><?php echo $row['datecreation']; ?></td>

                <td><?php echo $row['statut']; ?></td>

                <!--<td><?php //echo $row['Bref']; ?></td>-->

                <td> <a href="continuerremplircontratstage.php" class="btn btn-success">Continuer</a>
                </td>

            </tr>

            <?php
                } 
            ?>	

            </tbody>


            </table>
        </div>
    </div>
</body>
</html>