<?php
    include "db.php";
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
            include "include/banner.php";
        ?>
        <div class="title">
            <h1>Contrat de stage markup</h1>
            <h2>Validation des superviseurs</h2>
        </div>
        <div class="list-superviseurs">
        <a href="listecontratsuperviseur.php"  class="btn btn-success mb-2" >Liste des contrats</a> 
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>

            <tr>

                <th>Nom</th>

                <th>Adresse mail</th>

            <!--<th>Description</th>-->

                <th width="180">Statut</th>

            </tr>

            </thead>



            <tbody>

            <?php

                $query = $connection->prepare("select * from utilisateurs where poste=:poste");

                $query->execute(["poste"=>"superviseur"]);

                while($row = $query->fetch()){

                $id=$row['idUtilisateur'];


            ?>
            
            <tr>
            
                <td><?php echo $row['nom']; ?></td>

                <td><?php echo $row['email']; ?></td>

                <!--<td><?php //echo $row['Bref']; ?></td>-->

                <td> <?php
                        $valide = $row['valide']; 
                        if (strcmp($valide, "oui")==0){
                    ?>
                            <a href="changestatutsuperviseur.php?id=<?php  echo $id;?>&statut=<?php  echo $valide;?>"  class="btn btn-success" >&nbsp; Activé</a> 
                        <?php
                        }else{
                        ?>
                            <a href="changestatutsuperviseur.php?id=<?php  echo $id;?>&statut=<?php  echo $valide;?>"  class="btn btn-danger" >&nbsp; Désactivé</a> 
                        <?php
                        }
                    ?> 
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