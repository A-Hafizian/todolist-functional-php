<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE ?></title>
    <script src="<? BASE_URL ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/my-scripts.js"></script>

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/todolist-styles.css">
</head>

<body>
    <header id="top-header">
        <div class="container">
            <h3>To Do List App</h3>
            <h5>What do you need to do?</h5>
        </div>
    </header>

    <nav id="top-nav">
        <div class="container">
            <input type="search" id="search-box" placeholder="search....">

            <input type="checkbox" id="hide-completed">
            <label for="hide-completed">Hide Completed Tasks</label>
        </div>
    </nav>

    <nav id="nav-left">
        <header id="nav-header">FOLDER</header>
        <div>
            <ul id="holder-folder">
                <li>
                    <a href="<?= site_url() ?>">
                        <i class="fa fa-folder <?= isset($_GET['folder_id']) ? '' : 'active' ?>"> AllFolder</i>
                        
                    </a>
                </li>
                <?php foreach ($folders as $folder) : ?>
                    <li>
                        <a href="?folder_id=<?= $folder->id; ?>">
                            <i class="fa fa-folder <?= (isset($_GET['folder_id']) && ($_GET['folder_id'] == $folder->id)) ? 'active' : '' ?>"> <?= $folder->name; ?></i>
                        </a>
                        <a href="?delete_folder=<?= $folder->id; ?>" class="delet-folder">
                            <i class="fas fa-times close"></i>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

            <input type="text" id="newFolderInput">
            <button id="newFolderBtn">create</button>
        </div>
    </nav>
    <div class="container">
        <h3>You have <span id="remain_tasks">0</span> todos left</h3>

        <ul id="tasks-list">
            <?php if (sizeof($tasks)) : ?>
                <?php foreach ($tasks as $task) : ?>
                    <li class="animate__animated animate__bounceIn">
                        <input type="checkbox" id="task_<?= $task->task_id ?>">
                        <label for="task_<?= $task->task_id ?>"><?= $task->title; ?></label>

                        <a href="?deletTask=<?= $task->task_id ?>" class="remove">Remove</a>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <h3>empty!</h3>
            <?php endif; ?>
        </ul>


        <input type="text" id="new-task" placeholder="New Task">
        <button id="add-task">Add!</button>
    </div>
    <script>
        $(function() {
            $('#newFolderBtn').click(function(e) {
                e.preventDefault();
                let input = $('#newFolderInput');
                $.ajax({
                    type: "post",
                    url: "process/ajaxHandler.php",
                    data: {
                        action: 'addFolder',
                        folderName: input.val()
                    },
                    success: function(response) {
                        let res = JSON.parse(response);
                        if (res['rowCount'] == 1) {
                            $('<li><a href="?folder_id=' + res['id'] + '"><i class="fa fa-folder"> ' + input.val() + '</i></a><a href="?delete_folder=' + res['id'] + '" class="delet-folder"><i class="fas fa-times close"></i></a></li>').appendTo('#holder-folder');
                        }
                    }
                });
            });


            $('#add-task').click(function(e) {
                e.preventDefault();
                <?php if(!isset($_GET['folder_id'])):?>
                    alert('please selected a folder!');
                <?php else: ?>
                let value = $('#new-task').val();
                $.ajax({
                    type: "post",
                    url: "process/ajaxHandler.php",
                    data: {
                        action: 'addTask',
                        folderID: <?= isset($_GET['folder_id']) ? "{$_GET['folder_id']}" : '' ?>,
                        title: value
                    },
                    success: function(response) {
                        if (response == '1') {
                            location.reload();
                        }
                    }
                });
                <?php endif;?>
                /*  $('<li class="animate__animated animate__bounceIn"><input type="checkbox" id="task_' + number + '"><label for="task_' + number + '">' + value + '</label><a href="#" class="remove">Remove</a></li>')
                     .appendTo('#tasks-list')

                 $('#new-task').val(''); */

            });
        })
    </script>
</body>

</html>