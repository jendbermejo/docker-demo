<?php

require __DIR__ . '/../vendor/autoload.php';

$configPath =  __DIR__ . "/../config/";

// Instantiate the app
$settings = require "{$configPath}/settings.php";
$app = new \Slim\App($settings);

// Set up dependencies
require "{$configPath}/dependencies.php";

// Register middleware
require "{$configPath}/middleware.php";

// Register routes
require "{$configPath}/routes.php";

// Run app
$app->run();
