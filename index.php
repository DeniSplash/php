<?php

require_once 'User.php';
require_once 'Task.php';
require_once 'Comment.php';
require_once 'TaskService.php';
require_once 'Product.php';
require_once 'Cart.php';

$user1 = new User('Denis');
$user2 = new User('Alex');
$task1 = new Task('task1', $user1);
$comment1 = new Comment($user2, $task1, "comment1");
TaskService::addComment($task1, $comment1);

$product1 = new Product('Утюг', 2100.0);
$product2 = new Product('Клавиатура', 1100.5);
$product3 = new Product('Мышь', 1100.5);
$product4 = new Product('Монитор', 9500.0);
$product5 = new Product('Компьютер');
$product5->addComponent($product2);
$product5->addComponent($product3);
$product5->addComponent($product4);
$cart = new Cart();
$cart->addProduct($product1);
$cart->addProduct($product5);
$cart->removeProduct($product1);

var_dump($product5->getPrice());
var_dump($cart->getTotalPrice());


