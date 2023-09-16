<?php declare(strict_types=1);

# Dependency Manager File
require(APP_ROOT . "vendor/autoload.php");

# Env Variables
require(APP_ROOT . "src/libraries/dotenv.php");

# Container
$container = require(APP_ROOT . "src/libraries/Container.php");

