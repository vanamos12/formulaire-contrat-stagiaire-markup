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

                $query = $connection->prepare("select * from contratstagiaires");

                $query->execute();

                while($row = $query->fetch()){

                $id=$row['idContrat'];


            ?>
            
            <tr>
            
                <td><?php echo $row['nomcontrat']; ?></td>

                <td><?php echo $row['idContrat']; ?></td>

                <td><?php echo $row['datecreation']; ?></td>

                <td><?php echo $row['statut']; ?></td>

                <!--<td><?php //echo $row['Bref']; ?></td>-->

                <td>
                    <?php
                        if ($row['etape'] == LAST_ETAPE && $row['etapesuperviseur'] == LAST_ETAPE){
                    ?>
                    <a href="voircontratstage.php?id=<?php echo $row['idContrat']; ?>&poste=superviseur" class="btn btn-warning">Voir Contrat</a>
                    <?php
                        }
                        else if ($row['etapesuperviseur'] != LAST_ETAPE){ 
                    ?>
                    <a href="continuerremplircontratstage.php?id=<?php echo $row['idContrat']; ?>&poste=superviseur" class="btn btn-success">Continuer</a>
                    <?php
                        }
                    ?> 
                    <!--<a href="continuerremplircontratstage.php?id=<?php echo $row['idContrat']; ?>&poste=superviseur" class="btn btn-success">Continuer</a>-->
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