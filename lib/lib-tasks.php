<?php defined('SITE_TITLE') OR die('premision denied');
function getCourrentUserID()
{
    return 1;
}

function addFolder($folderName)
{
    $courrntUserID = getCourrentUserID();
    global $pdo;
    $query = "INSERT INTO `folder` ( `name`, `user_id`) VALUES (:folderName, :user_id);";
    $stmt = $pdo ->prepare($query);
    $stmt->execute([':folderName'=>$folderName,':user_id'=>$courrntUserID]);
    $id  = $pdo ->lastInsertId();
    $row = $stmt->rowCount();
    $resualt =[
        "id" => $id,
        "rowCount" =>$row
    ];
   return($resualt);
}


function removeFolder($id_folder)
{
    global $pdo;
    $sql = "delete from folder where id = :id_folder;";
    $stmt = $pdo ->prepare($sql);
    $stmt ->execute(['id_folder' => $id_folder]);
}

function getFolders()
{   
    $courrntUserID = getCourrentUserID();
    global $pdo;
    $query = "SELECT * FROM folder WHERE user_id = $courrntUserID;";
    $stmt = $pdo ->prepare($query);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record;
    
}
