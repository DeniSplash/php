<?php
include_once "model/User.php";
include_once "model/Task.php";
include_once "model/TaskProvider.php";
$pdo = require 'db.php';

session_start();

$filtred = false;

$username = null;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();
} else {
    header("Location: /");
    die();
}

$taskProvider = new TaskProvider($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskProvider->addTask(new Task($_POST['task']));
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'showDone') {
    $filtred = true;
    $tasks = $taskProvider->getDoneList();

}

if (isset($_GET['action']) && $_GET['action'] === 'showUnDone') {
    $filtred = true;
    $tasks = $taskProvider->getUndoneList();
    
}

if (isset($_GET['action']) && $_GET['action'] === 'showAll') {
    $filtred = false;
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $id = $_GET['id'];
    $taskProvider->doDoneTask($id);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'dell') {
    $id = $_GET['id'];
    $taskProvider->dellTask($id);
    header("Location: /?controller=tasks");
    die();
}

$pageHeader = "Задачи";

if ($filtred === false) {
    $tasks = $taskProvider->getAllList();
}


include "view/tasks.php";