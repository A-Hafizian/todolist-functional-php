<?php

    include 'constanst.php';
    include BASE_PATH.'bootstrap/config.php';
    include BASE_PATH.'lib/helpser.php';

    try {
        $pdo = new PDO("mysql:dbname = {$config_database -> host};host={$config_database->host};",$config_database->user,$config_database->pass);
    } catch (PDOException $e) {
        dieMassage('connect faild '.$e->getMessage()) ;
        die();
    }

    include BASE_PATH.'vendor/autoload.php';