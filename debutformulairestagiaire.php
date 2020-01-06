<?php
    include "db.php";
    if (isset($_POST["soumettre"])){
        $idContrat = $_SESSION['etape']['idContrat'];
        $typeFormation = "";
        $formation = "";

        // penser aux ISSET
        $typeFormation = $_POST["choixformation"];
        if (isset($_POST["choixformationformation"])){
            $formation = $_POST["choixformationformation"];
        }
        if (strcmp($typeFormation, STAGE) == 0){
            $typeFormation = $_POST["typestage"];
            if (strcmp($typeFormation, STAGE_ACADEMIQUE)==0){
                $formation = $_POST["choixformationstageacademique"];
            }else{
                $formation = $_POST["choixformationstagepreemploi"];
            }    
        }
        $data = [
            "typeFormation"=>$typeFormation,
            "formation"=>$formation,
            "idContrat"=>$idContrat
        ];
        $stmt = $connection->prepare("INSERT INTO typestagiaire(idContrat, typeFormation, formation)
                                            VALUES(:idContrat, :typeFormation, :formation)");
        if ($stmt->execute($data)){
            $succesInscription = "<p class='green'>Enregistrement effectué, vous pouvez continuer.</p>";
            header("location:continuerremplircontratstage.php");
        }else{
            $succesInscription = "<p class='red'>Echec de l'enregistrement, veuillez réessayer.</p>"; 
        }
        
    }
    

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
            <h1>MARKUP CONSULTING</h1>
            <h2>Que voulez-vous faire à Markup</h2>
        </div>
        <div class="inscription-form">
            <form action="" method="POST">
                <div class="form-group">
                    <input class="form-label" type="radio" id="radioformation" value="<?php echo FORMATION; ?>" checked="checked" name="choixformation"/>
                    <label for="radioformation"><?php echo FORMATION; ?></label>
                </div>
                <div id="monchoixformationformation" class="form-group ml-4">
                    <input class="form-label" type="radio" id="radioformationcomplete" value="<?php echo FORMATION_COMPLETE; ?>" checked="checked" name="choixformationformation"/>
                    <label for="radioformationcomplete"><?php echo FORMATION_COMPLETE; ?></label><br/>
                    <input class="form-label" type="radio" id="radioformationcontent" value="<?php echo CONTENT_MARKETING; ?>" name="choixformationformation"/>
                    <label for="radioformationcontent"><?php echo CONTENT_MARKETING; ?></label><br/>
                    <input class="form-label" type="radio" id="radioformationinbound" value="<?php echo INBOUND_MARKETING; ?>" name="choixformationformation"/>
                    <label for="radioformationinbound"><?php echo INBOUND_MARKETING; ?></label><br/>
                    <input class="form-label" type="radio" id="radioformationcommmunity" value="<?php echo COMMUNITY_MANAGEMENT; ?>" name="choixformationformation"/>
                    <label for="radioformationcommmunity"><?php echo COMMUNITY_MANAGEMENT; ?></label><br/>
                    <input class="form-label" type="radio" id="radioformationemailing" value="<?php echo E_MAILING; ?>" name="choixformationformation"/>
                    <label for="radioformationemailing"><?php echo E_MAILING; ?></label><br/>
                    <input class="form-label" type="radio" id="radioformationinfographie" value="<?php echo INFOGRAPHIE; ?>" name="choixformationformation"/>
                    <label for="radioformationinfographie"><?php echo INFOGRAPHIE; ?></label><br/>
                    <input class="form-label" type="radio" id="radioformationweb" value="<?php echo WEB_DESIGN; ?>" name="choixformationformation"/>
                    <label for="radioformationweb"><?php echo WEB_DESIGN; ?></label><br/>
                    <input class="form-label" type="radio" id="radiostagereferencement" value="<?php echo REFERENCEMENT; ?>" name="choixformationformation"/>
                    <label for="radioformationreferencement"><?php echo REFERENCEMENT; ?></label>
                </div>
                <div class="form-group">
                    <input class="form-label" type="radio" id="radiostage" value="<?php echo STAGE; ?>" name="choixformation"/>
                    <label for="radiostage"><?php echo STAGE; ?></label>
                </div>
                <div id="monchoixtypestage" class="form-group ml-4">
                    <input class="form-label" type="radio" id="radiostagetypeacademique" value="<?php echo STAGE_ACADEMIQUE;?>" checked="checked" name="typestage"/>
                    <label for="radiostagetypeacademique"><?php echo STAGE_ACADEMIQUE;?></label><br/>
                    <div id="monchoixformationstageacademique" class="form-group ml-4">
                        <input class="form-label" type="radio" id="radiostagewebacademique" checked="checked" value="<?php echo DEVELOPPEMENT_WEB; ?>" name="choixformationstageacademique"/>
                        <label for="radiostagewebacademique"><?php echo DEVELOPPEMENT_WEB; ?></label><br/>
                        <input class="form-label" type="radio" id="radiostageinfographieacademique" value="<?php echo INFOGRAPHIE_STAGE; ?>" name="choixformationstageacademique"/>
                        <label for="radiostageinfographieacademique"><?php echo INFOGRAPHIE_STAGE; ?></label><br/>
                        <input class="form-label" type="radio" id="radiostagephotographieacademique" value="<?php echo PHOTOGRAPHIE; ?>" name="choixformationstageacademique"/>
                        <label for="radiostagephotographieacademique"><?php echo PHOTOGRAPHIE; ?></label><br/>
                        <input class="form-label" type="radio" id="radiostagecommunityacademique" value="<?php echo COMMUNITY_MANAGEMENT_STAGE?>" name="choixformationstageacademique"/>
                        <label for="radiostagecommunityacademique"><?php echo COMMUNITY_MANAGEMENT_STAGE?></label>
                    </div>    
                    <input class="form-label" type="radio" id="radiostagetypepreemploi" value="<?php echo STAGE_PRE_EMPLOI; ?>" name="typestage"/>
                    <label for="radiostagetypepreemploi"><?php echo STAGE_PRE_EMPLOI; ?></label>
                    <div id="monchoixformationstagepreemploi" class="form-group ml-4">
                        <input class="form-label" type="radio" id="radiostagewebpreemploi" checked="checked" value="<?php echo DEVELOPPEMENT_WEB; ?>" name="choixformationstagepreemploi"/>
                        <label for="radiostagewebpreemploi"><?php echo DEVELOPPEMENT_WEB; ?></label><br/>
                        <input class="form-label" type="radio" id="radiostageinfographiepreemploi" value="<?php echo INFOGRAPHIE_STAGE; ?>" name="choixformationstagepreemploi"/>
                        <label for="radiostageinfographiepreemploi"><?php echo INFOGRAPHIE_STAGE; ?></label><br/>
                        <input class="form-label" type="radio" id="radiostagephotographiepreemploi" value="<?php echo PHOTOGRAPHIE; ?>" name="choixformationstagepreemploi"/>
                        <label for="radiostagephotographiepreemploi"><?php echo PHOTOGRAPHIE; ?></label><br/>
                        <input class="form-label" type="radio" id="radiostagecommunitypreemploi" value="<?php echo COMMUNITY_MANAGEMENT_STAGE?>" name="choixformationstagepreemploi"/>
                        <label for="radiostagecommunitypreemploi"><?php echo COMMUNITY_MANAGEMENT_STAGE?></label>
                    </div> 
                </div>
                
                
                <div>
                    <input class="btn btn-primary" type="submit" value="Soumettre" name="soumettre" />
                    <input class="btn btn-light" type="reset" value="Annuler" />
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery3.4.1.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#monchoixformationstage").hide();
            $("#monchoixtypestage").hide();
            $("#radiostage").click(function(){
                $("#monchoixformationformation").hide();
                $("#monchoixtypestage").show();
                $("#monchoixformationstagepreemploi").hide();
                $("#monchoixformationstageacademique").show();
            });
            $("#radioformation").click(function(){
                //$("#monchoixformationstage").hide();
                $("#monchoixtypestage").hide();
                $("#monchoixformationformation").show();
            });
            $("#radiostagetypeacademique").click(function(){
                $("#monchoixformationformation").hide();
                $("#monchoixformationstagepreemploi").hide();
                $("#monchoixformationstageacademique").show();
            });
            $("#radiostagetypepreemploi").click(function(){
                $("#monchoixformationformation").hide();
                $("#monchoixformationstageacademique").hide();
                $("#monchoixformationstagepreemploi").show();
            });
        });
    </script>
</body>
</html>