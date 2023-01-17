<?php

require_once 'Task.php';
require_once 'User.php';

class TaskProvider
{
    private array $tasks = array();

    public function getTasks() : ?array 
    { 
        return $this->tasks;
    }

    public function addNewTask(string $description, User $owner) : ?array
    {
        $idTask = count($this->tasks) + 1;

        $this->tasks[$idTask] = new Task($idTask, $description, $owner);
        return $this->tasks;
    }

    public function setTasks(array $taskSesion) : ?array
    {
        $this->tasks = $taskSesion;
        return $this->tasks;
    }

    public static function getUndoneList (array $tasks) : ?array
    {
        $arr = array();

        foreach ($tasks as $value) {
            if (!$value->getIsDone()) {
                $arr[] = $value;
            }
        }

        return $arr;
    }

    public static function getDoneList (array $tasks) : ?array
    {
        $arr = array();

        foreach ($tasks as $value) {
            if ($value->getIsDone()) {
                $arr[] = $value;
            }
        }

        return $arr;
    }

    public static function setDone () : ? Task
    {
        $task = $tasks[0];

        $task->setDone(false);

        return $task;
    }

    



}