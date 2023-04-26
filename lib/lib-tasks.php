<?php 
function getCourrentUserID()
{
    return 1;
}

function addTask($title, $folder_id)
{
    $courrntUserID = getCourrentUserID();
    global $pdo;
    $query = "INSERT INTO `task` ( `title`, `user_id`,`folder_id`) VALUES (:title, :user_id, :folder_id);";
    $stmt = $pdo ->prepare($query);
    $stmt->execute([':title'=>$title,':user_id'=>$courrntUserID, ':folder_id'=>$folder_id]);
    $row = $stmt->rowCount();
   
   return($row);
}
function removeTask($taskID)
{
    global $pdo;
    $sql = "delete from task where task_id = :id_task;";
    $stmt = $pdo ->prepare($sql);
    $stmt ->execute([':id_task' => $taskID]);
}


function getTasks()
{
    
    $sql_folder = null;
    if (isset($_GET['folder_id']) && is_numeric($_GET['folder_id'])) {
        $sql_folder = "and folder_id =". $_GET['folder_id'];
    }
    $courrntUserID = getCourrentUserID();
    global $pdo;
    $query = "SELECT * FROM task where user_id = $courrntUserID $sql_folder;";
    $stmt = $pdo ->prepare($query);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record;
    
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
