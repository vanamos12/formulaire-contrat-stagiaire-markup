<div class="banner clearfix">
    <div class="float-left">
        <img src="img/logo.png" alt="logo markup"/>
    </div>
    <div class="float-right mt-2">
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