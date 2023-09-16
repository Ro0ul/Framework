<?php declare(strict_types=1);

define("APP_ROOT",__DIR__ . "/../");

# Bootstrap
require_once(APP_ROOT . "src/bootstrap.php");

# Error Handling
require(APP_ROOT . "src/libraries/whoops.php");

# Router 
require(APP_ROOT . "router/web.php");