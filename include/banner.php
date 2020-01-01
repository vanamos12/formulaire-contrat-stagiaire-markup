<div class="banner">
    <div class="pull-left">
        <img src="img/logo.png" alt="logo markup"/>
    </div>
    <div class="pull-right">
        <span class="blue">
            <?php 
                if (isset($_SESSION["utilisateur"])){
                    echo $_SESSION["utilisateur"]["nom"];
                }
            ?>
        </span>
        <a href="deconnexion.php" class="btn btn-danger">D&eacute;connexion</a>
    </div>
</div>