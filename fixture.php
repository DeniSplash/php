<?php
require_once "model/User.php";
require_once "model/UserProvider.php";
$pdo = require 'db.php';

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    description VARCHAR (150),
    isDone INTEGER DEFAULT (0) 
);');

$user = new User('admin');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');