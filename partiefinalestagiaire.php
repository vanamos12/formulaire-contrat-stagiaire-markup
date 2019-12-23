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
            var mouseClickedIncanvas = false;
            var mouseX = 0;
            var mouseY = 0;
            function draw(){
                drawSignature();
            }
            function drawSignature(){
                if (mouseClickedIncanvas){
                    ctx.font = "20px Arial"
                    ctx.fillStyle = "#000000"
                    ctx.fillText(".", mouseX, mouseY)
                }
                requestAnimationFrame(draw)
            }
            function mouseDown(e){
                mouseClickedIncanvas = true;
                
            }
            function mouseUp(e){
                if (mouseClickedIncanvas){
                    mouseClickedIncanvas = false
                }
            }
            function mouseMove(e){
                mouseX = e.offsetX;
                mouseY = e.offsetY;

                console.log("mouseX", mouseX);
                console.log("mouseY", mouseY);
            }
            canvas.addEventListener("mousedown", mouseDown, false)
            canvas.addEventListener("mousemove", mouseMove, false)
            document.addEventListener("mouseup", mouseUp, false)
            //var interval = setInterval(draw, 1);
        })
    </script>

</body>
</html>