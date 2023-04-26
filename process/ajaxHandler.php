<?php  


include '../bootstrap/init.php';
if (! isAjaxResquest()) {
    dieMassage('in request not ajax');
}
if (empty($_POST['action'])||!isset($_POST['action'])) {
    dieMassage('request invalid');
}
 switch ($_POST['action']) {
    case 'addFolder':
         echo json_encode(addFolder($_POST['folderName'])) ;
        
        break;
    case 'addTask':
        //echo json_encode(addFolder($_POST['folderName'])) ;
        echo addTask($_POST['title'], $_POST['folderID']);
        break;
    default:
        # code...
        break;
}