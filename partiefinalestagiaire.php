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
            <h1>Contrat de stage</h1>
            <h2>Partie E - Planification de l'encadrement / supervision du stagiaire</h2>
        </div>
        <div class="inscription-form">
            <p> L’encadreur du stagiaire est charg&eacute;e de :</p>
            <ul>
                <li>Donner des consignes au stagiaire;</li>
                <li>&Eacute;valuer le travail du stagiaire</li>
                <li>Fournir au stagiaire une r&eacute;troaction sur le travail accompli;</li>
                <li>Dispenser une formation ou un entra&icirc;nement au stagiaire.</li>
            </ul>
        </div>
        <div class="title">
            <h2>Partie G - Signatures</h2>
        </div>
        <div class="inscription-form">
            <h5>LE/LA Stagiaire</h5>
            <canvas id="signaturestagiaire" width="250" height="200"></canvas>
            <button class ="btn btn-primary" id="resetSign">Annuler</button>
        
        </div>
    </div>

    <script type="text/javascript" 
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="js/app.js">
    </script>
    <script type="text/javascript" src="js/sign.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            console.log("page fully loaded.");
           $('#signaturestagiaire').sign({
               resetButton: $('#resetSign'),
               lineWidth: 20,
               width:250,
               height:200
           })
           console.dir({"hello": "Myhello"})
        })
    </script>

</body>
</html>