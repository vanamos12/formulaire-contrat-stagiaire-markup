<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "include/head.php";
    ?>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>MARKUP CONSULTING</h1>
            <h2>Que voulez-vous faire à Markup</h2>
        </div>
        <div class="inscription-form">
            <form action="" method="POST">
                <div class="form-group">
                    <input class="form-label" type="radio" id="radioformation" value="radioformation" checked="checked" name="choixformation"/>
                    <label for="radioformation">Formation</label>
                </div>
                <div id="monchoixformationformation" class="form-group ml-4">
                    <input class="form-label" type="radio" id="radioformationcomplete" checked="checked" name="choixformationformation"/>
                    <label for="radioformationcomplete">Formation compl&eacute;te</label><br/>
                    <input class="form-label" type="radio" id="radioformationcontent" name="choixformationformation"/>
                    <label for="radioformationcontent">Content Marketing</label><br/>
                    <input class="form-label" type="radio" id="radioformationinbound" name="choixformationformation"/>
                    <label for="radioformationinbound">Inbound Marketing</label><br/>
                    <input class="form-label" type="radio" id="radioformationcommmunity" name="choixformationformation"/>
                    <label for="radioformationcommmunity">Community Marketing</label><br/>
                    <input class="form-label" type="radio" id="radioformationemailing" name="choixformationformation"/>
                    <label for="radioformationemailing">E-mailing</label><br/>
                    <input class="form-label" type="radio" id="radioformationinfographie" name="choixformationformation"/>
                    <label for="radioformationinfographie">Infographie</label><br/>
                    <input class="form-label" type="radio" id="radioformationweb" name="choixformationformation"/>
                    <label for="radioformationweb">Web Design</label><br/>
                    <input class="form-label" type="radio" id="radiostagereferencement" name="choixformationformation"/>
                    <label for="radioformationreferencement">R&eacute;f&eacute;rencement</label>
                </div>
                <div class="form-group">
                    <input class="form-label" type="radio" id="radiostage" name="choixformation"/>
                    <label for="radiostage">Stage</label>
                </div>
                <div id="monchoixformationstage" class="form-group ml-4">
                    <input class="form-label" type="radio" id="radiostageweb" checked="checked" name="choixformationstage"/>
                    <label for="radiostageweb">D&eacute;veloppement Web</label><br/>
                    <input class="form-label" type="radio" id="radiostageinfographie" name="choixformationstage"/>
                    <label for="radiostageinfographie">Infographie</label><br/>
                    <input class="form-label" type="radio" id="radiostagephotographie" name="choixformationstage"/>
                    <label for="radiostagephotographie">Photographie</label><br/>
                    <input class="form-label" type="radio" id="radiostagecommunity" name="choixformationstage"/>
                    <label for="radiostagecommunity">Community Management</label>
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
            $("#radiostage").click(function(){
                $("#monchoixformationformation").hide();
                $("#monchoixformationstage").show();
                console.log("okay");
            });
            $("#radioformation").click(function(){
                $("#monchoixformationstage").hide();
                $("#monchoixformationformation").show();
            });
        });
    </script>
</body>
</html>