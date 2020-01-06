<?php 
    include "db.php";
    
    // on doit se protéger contre les processus concurrents
    if (!function_exists('sem_get')) {
        function sem_get($key) {
            return fopen(__FILE__ . '.sem.' . $key, 'w+');
        }
        function sem_acquire($sem_id) {
            return flock($sem_id, LOCK_EX);
        }
        function sem_release($sem_id) {
            return flock($sem_id, LOCK_UN);
        }
    }
    $semphore_key = 2121;
    $semaphore_max = 1;
    $semaphore_permissions = 0666;
    $semphore_autorelease = 1;
    $semaphore = sem_get($semphore_key, $semaphore_max, $semaphore_permissions, $semphore_autorelease);
    if (!$semaphore){
        echo "Failed to get semaphore - sem_get().\n";
        exit();
    }
    // Start of the protected zone
    sem_acquire($semaphore);
    $numeroDossier = "";
    do{
        $numeroDossier = rand(MIN_NUMERO_DOSSIER, MAX_NUMERO_DOSSIER);
        $sql = $connection->prepare("SELECT * FROM contratstagiaires where numerodossier=:numerodossier");
        $sql->execute(["numerodossier"=>$numeroDossier]);

    }while($sql->fetch());

    $increment = $connection->prepare("SELECT AUTO_INCREMENT FROM information_schema.TABLES
                                        WHERE TABLE_SCHEMA=:tableschema AND TABLE_NAME=:tablename");
    $increment->execute(["tableschema"=>"stagiairemarkup", "tablename"=>"contratstagiaires"]);
    $row = $increment->fetch();

    $idContrat = $row["AUTO_INCREMENT"];
    // end of the protected zone
    sem_release($semaphore);

    $stmt = $connection->prepare("INSERT INTO 
        contratstagiaires(idStagiaire, nomcontrat, numerodossier, statut, etape, etapesuperviseur)
        VALUES(:idUtilisateur, :nomcontrat, :numerodossier, :statut, :etape, :etapesuperviseur)");
   
    $data = [
        "idUtilisateur"=>$_SESSION['utilisateur']['idUtilisateur'],
        "nomcontrat"=>$_SESSION['utilisateur']['nom']." - ".$idContrat,
        "numerodossier"=>$numeroDossier,
        "statut"=>EN_ATTENTE_STAGIAIRE,
        "etape"=>BEGIN_ETAPE_STAGIAIRE,
        "etapesuperviseur"=>BEGIN_ETAPE_SUPERVISEUR
    ];
    $stmt->execute($data);

    header("location:listecontratstagiaire.php");

?>