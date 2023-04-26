<?php 

include 'constanst.php';
include BASE_PATH.'bootstrap/config.php';
include BASE_PATH.'lib/helpser.php';
try {
    $pdo = new PDO("mysql:host = $config_database->host;dbname=$config_database->db",$config_database->user,$config_database->pass);
} catch (PDOException $e) {
    dieMassage('connect faild '.$e->getMessage()) ;
   // echo 'connect faild '.$e->getMessage();
}

include BASE_PATH.'vendor/autoload.php';
include BASE_PATH.'lib/lib-tasks.php';
include BASE_PATH.'lib/lib-auth.php';