<?php 
    include "db.php";
    if (isset($_GET['id'])){
        $idContrat = $_GET['id'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat de Stage d&ucirc;ment rempli</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1 class="red">CONTRAT DE STAGE</h1>
        </div>
        <!-- Partie a Identification de l'entreprise -->
        <div class="inscription-form">
        <?php
            $query = $connection->prepare("select * from partiasuperviseur where idContrat=:idContrat");

            $query->execute(["idContrat"=>$idContrat]);

            while($row = $query->fetch()){

            $id=$row['idContrat'];
        ?>
        </div>
    </div>
</body>
</html>
<?php
}
?>
