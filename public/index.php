<?php

// Show errors in development enviroment
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

// Use enviroment vars
$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

require_once "../config/database.php";
require_once "../config/router.php";