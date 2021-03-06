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
        include "include/banner.php"
    ?>
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
            <h5>LE Directeur général</h5>
            <canvas id="signaturesuperviseur" width="250" height="200"></canvas>
            <button class ="btn btn-primary" id="resetSign">Effacer</button>
            <button class="btn btn-primary" id="savesignature">Sauvegarder</button>
        </div>
    </div>
    <script type="text/javascript" src="js/signature-pad.js"> 
    </script>
    <script type="text/javascript" src="js/jquery3.4.1.js"> 
    </script>
    <script type="text/javascript" src="js/app.js">
    </script>
    
    <script type="text/javascript">
        
        var canvas = document.querySelector('canvas')
        var signaturePad = new SignaturePad(canvas)
        signaturePad.minWidth = 1
        signaturePad.maxWidth = 2
        signaturePad.penColor = "rgba(0, 0, 0, 1)"
        
        function recommencer(){
            signaturePad.clear()
        }
        function savesignature(){
            if (signaturePad.isEmpty()){
                alert("Vous devez obligatoirement signer le document.");
            }else{
                var image = signaturePad.toDataURL();
                $.ajax({
                    url:'registersignature.php',
                    method:'POST',
                    data:{type:'superviseur', image:image},
                    success:function(data){
                        data = JSON.parse(data)
                        if (data['status'] === "success"){
                            window.location.href = "continuerremplircontratstage.php";
                            //alert("Les données ont été bien savegardées.")
                        }
                        
                    },
                    error: function(){
                        alert("Données non sauvegardées; veuillez réessayer.")
                    }
                })
            }
        }
        var reset = document.getElementById('resetSign')
        reset.addEventListener("click", recommencer)
        var sauvegarder = document.getElementById('savesignature')
        sauvegarder.addEventListener("click", savesignature)
    </script>
</body>
</html>