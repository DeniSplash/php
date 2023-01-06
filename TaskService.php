<?php

require_once 'Comment.php';
require_once 'Task.php';
class TaskService {
    public static function addComment(Task $task, Comment $comment) : void
    {
        $task->addComment($comment);
    }
}