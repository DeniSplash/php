<?php

require_once 'model/UserProvider.php';
require_once 'model/TaskProvider.php';
require_once 'model/Task.php';

session_start();

$pageHeader = "Задачи";

$username = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $username = $user->getUsername();
}

$error = null;

if (isset($_POST['description'])) {
    ['description' => $description] = $_POST;

    $taskProvider = new TaskProvider();

    if (isset($_SESSION['tasks'])) {
        $taskProvider->setTasks($_SESSION['tasks']);
    }

    $taskProvider->addNewTask($description, $user);

    $_SESSION['tasks'] = $taskProvider->getTasks();
}

if (isset($_SESSION['tasks'])) {
    $tasks = $_SESSION['tasks'];
} else {
    $tasks = array();
}

if (isset($_POST['showUnDone'])) {
    $tasks = TaskProvider::getUndoneList($_SESSION['tasks']);
}

if (isset($_POST['showDone'])) {
    $tasks = TaskProvider::getDoneList($_SESSION['tasks']);
}

if (isset($_POST['showAll'])) {
    $tasks = $_SESSION['tasks'];
}

if (isset($_POST['isDoneId'])) {

    $isDoneId = (string)$_POST["isDoneId"];
    echo $isDoneId;
    $tasks[$isDoneId]->setIsDone(!$tasks[$isDoneId]->getIsDone());

    
}

include "view/tasks.php";