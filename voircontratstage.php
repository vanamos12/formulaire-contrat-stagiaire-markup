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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Contrat de Stage d&ucirc;ment rempli</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1 class="red">CONTRAT DE STAGE</h1>
        </div>
        <!-- Partie a Identification de l'entreprise -->
        <div class="inscription-form partiea">
        <?php
            $querya = $connection->prepare("select * from partieasuperviseur where idContrat=:idContrat");

            $querya->execute(["idContrat"=>$idContrat]);

            $rowa = $querya->fetch();
        ?>
        <h2 class="blue">Partie A - Identification de l'entreprise </h2>
        <table>
            <tr>
                <td class="bold" colspan="2">Nom de l'entreprise : MARKUP CONSULTING</td>
                <td></td>
            </tr>
            <tr>
                <td>Responsable : <?php echo $rowa["nomresponsable"]; ?></td>
                <td>Titre : <?php echo $rowa["titreresponsable"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Adresse : <?php echo $rowa["adresseresponsable"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Ville : <?php echo $rowa["villeresponsable"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">T&eacute;l&eacute;phone : <?php echo $rowa["telephoneresponsable"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Adresse E Mail : <?php echo $rowa["emailresponsable"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td class="bold">Superviseur du stagiaire : <?php echo $rowa["nomsuperviseur"]; ?></td>
                <td> Titre : <?php echo $rowa["titresuperviseur"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">T&eacute;l&eacute;phone : <?php echo $rowa["telephonesuperviseur"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Adresse Email : <?php echo $rowa["emailsuperviseur"]; ?></td>
                <td> </td>
            </tr>
        </table>
        </div>
        <!-- Partie b Identification du stagiaire -->
        <div class="inscription-form partieb">
        <?php
            $queryb = $connection->prepare("select * from partiebstagiaire where idContrat=:idContrat");

            $queryb->execute(["idContrat"=>$idContrat]);

            $rowb = $queryb->fetch();
        ?>
        <h2 class="blue">Partie B - Identification du stagiaire </h2>
        <table>
            
            <tr>
                <td>Nom : <?php echo $rowb["nomstagiaire"]; ?></td>
                <td>Pr&eacute;nom : <?php echo $rowb["prenomstagiaire"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Adresse : <?php echo $rowb["adressestagiaire"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td>Ville : <?php echo $rowb["villestagiaire"]; ?></td>
                <td>Code postal : <?php echo $rowb["codepostalstagiaire"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">T&eacute;l&eacute;phone : <?php echo $rowb["telephonestagiaire"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Adresse E Mail : <?php echo $rowb["emailstagiaire"]; ?></td>
                <td> </td>
            </tr>
            
        </table>
        </div>

        <!-- Partie c Mandat et tâches du stagiaire-->
        <div class="inscription-form partiec">
        <?php
            $queryc = $connection->prepare("select * from partiecsuperviseur where idContrat=:idContrat");

            $queryc->execute(["idContrat"=>$idContrat]);

            $rowc = $queryc->fetch();
        ?>
        <h2 class="blue">Partie C - Mandat et t&acirc;ches du stagiaire </h2>
        <table>
            
            <tr>
                <td colspan="2"> <?php echo $rowc["mandattachesstagiaire"]; ?></td>
                <td></td>
            </tr>
            
        </table>
        </div>

        <!-- Partie d Coordonnées du stage -->
        <div class="inscription-form partied">
        <?php
            $queryd = $connection->prepare("select * from partiedstagiaire where idContrat=:idContrat");

            $queryd->execute(["idContrat"=>$idContrat]);

            $rowd = $queryd->fetch();
        ?>
        <h2 class="blue">Partie D - Coordonnées stagiaire</h2>
        <table>
            
            <tr>
                <td colspan="2">Dur&eacute;e totale du stage :  <?php echo $rowd["dureetotalestage"]; ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">D&eacute;but du stage : <?php echo $rowd["datedebutstage"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Fin du stage : <?php echo $rowd["datefinstage"]; ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">Lieu du stage : <?php echo $rowd["lieustage"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Horaires de la semaine : <?php echo $rowd["horairessemainestage"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">Horaires de la journ&eacute;e : <?php echo $rowd["horairesjourneestage"]; ?></td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2">P&eacute;riode d'int&eacute;rruption pr&eacute;vue : <?php echo $rowd["periodesinterruptionstage"]; ?></td>
                <td> </td>
            </tr>
        </table>
        </div>
        <!-- Partie E - Planification de l'encadrement / Supervision du stagiaire -->
        <div class="inscription-form partiee">
            <h2 class="blue">Partie E - Planification de l'encadrement / Supervision du stagiaire</h2>
            <p> L’encadreur du stagiaire est charg&eacute;e de :</p>
            <ul>
                <li>Donner des consignes au stagiaire;</li>
                <li>&Eacute;valuer le travail du stagiaire</li>
                <li>Fournir au stagiaire une r&eacute;troaction sur le travail accompli;</li>
                <li>Dispenser une formation ou un entra&icirc;nement au stagiaire.</li>
            </ul>
        </div>
        <!-- Partie G - Signatures -->
        <?php
            $queryg = $connection->prepare("select * from signatures where idContrat=:idContrat order by poste desc");

            $queryg->execute(["idContrat"=>$idContrat]);

            $rowg = $queryg->fetchAll();
        ?>
        <div class="inscription-form partieg">
            <div width="50%">
                <h5 class="bold"><u>Directeur général</u></h5>
                <img alt="Signature Directeur" src="<?php echo $rowg[0]['imageURL']; ?>"/>
            </div>
            <div width="50%">
                <h5 class="bold"><u>LE/LA Stagiaire</u></h5>
                <img alt="Signature Stagiaire" src="<?php echo $rowg[1]['imageURL']; ?>"/>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>
