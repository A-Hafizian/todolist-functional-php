<?php
include 'bootstrap/init.php';

if ((isset($_GET['delete_folder'])) && (is_numeric($_GET['delete_folder']))) {
    removeFolder($_GET['delete_folder']);
    
}

$folders = getFolders();

include BASE_PATH.'tmp/todoList.php';