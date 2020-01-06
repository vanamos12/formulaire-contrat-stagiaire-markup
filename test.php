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

    echo $numeroDossier;
    sem_release($semaphore);
?>