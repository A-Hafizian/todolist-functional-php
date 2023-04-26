<?php
include 'bootstrap/init.php';

/* if (!isLoggedIn()) {
    header("Location: ".site_url("auth.php"));
} */

if ((isset($_GET['delete_folder'])) && (is_numeric($_GET['delete_folder']))) {
    removeFolder($_GET['delete_folder']);
    
}
if (isset($_GET['deletTask']) && is_numeric($_GET['deletTask'])) {
    removeTask($_GET['deletTask']);
}

$folders = getFolders();
$tasks = getTasks();

include BASE_PATH.'tmp/todoList.php';