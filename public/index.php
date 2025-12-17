
<?php

session_start();

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Router.php';

$router = new Router();
