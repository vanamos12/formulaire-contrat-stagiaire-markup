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
            <form action="" method="POST">
                <h5>LE/LA Stagiaire</h5>
                <canvas id="signaturestagiaire" width="250" height="200"></canvas>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery3.3.1.js">
    </script>
    <script type="text/javascript" src="js/app.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var canvas = document.getElementById("signaturestagiaire")
            var ctx = canvas.getContext("2d");
            function draw(){

            }
            function mouseDown(e){
                console.log("We pressed the mouse");
                var relativeX = e.clientX - canvas.offsetLeft;
                var relativeY = e.clientY - canvas.offsetTop;
                //console.log("relativeY", relativeY);
                //console.log("e.clientY", e.clientY)
                console.log("canvas.offsetTop", canvas.offsetTop)
                console.log("canvas.offsetHeight", canvas.offsetHeight)

                console.log("e.offsetX", e.offsetX);
                console.log("e.offsetY", e.offsetY);
                console.log("e.pageX", e.pageX);
                console.log("e.pageY", e.pageY);
                //console.log("e.clientX", e.clientX);
                
                if (relativeX>=0 && relativeX<=canvas.width){
                    console.log("I am in a canvas width");
                    if (relativeY>=0 && relativeY <= canvas.height){
                        console.log("I am in a canvas height");
                    }
                }
            }
            function mouseUp(e){
                console.log("We release the mouses");
            }
            canvas.addEventListener("mousedown", mouseDown, false)
            canvas.addEventListener("mouseup", mouseUp, false)
            var interval = setInterval(draw, 10);
        })
    </script>

</body>
</html>