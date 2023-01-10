<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=SITE_TITLE?></title>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/todolist-styles.css">
    <script src="<?BASE_URL?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=BASE_URL?>assets/js/my-scripts.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/animate.min.css">
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
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fas fa-folder"></i>
                        salam
                    </a>
                </li>
            </ul>
            
            <input type="text" id="newFolderInput">
            <button id="newFolderBtn">create</button>
        </div>
    </nav>
    <div class="container">
        <h3>You have <span id="remain_tasks">0</span> todos left</h3>

        <ul id="tasks-list">
            <!--<li class="animate__animated animate__bounce">
                <input type="checkbox" id="task_1">
                <label for="task_1">Alireza</label>

                <a href="#" class="remove">Remove</a>
            </li>-->

        </ul>

        <form id="new-task-form">
            <input type="text" id="new-task" placeholder="New Task">
            <input type="submit" value="Add !">
        </form>
    </div>

</body>

</html>