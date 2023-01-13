<?php

//session_start();
//session_destroy();

$controller = $_GET['controller'] ?? 'index';

$routes = require 'routes.php';

require_once $routes[$controller] ?? die('404');