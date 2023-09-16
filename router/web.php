<?php declare(strict_types=1);

use Src\Core\Route;
use Src\Http\Request;
use Src\Controllers\Controller;

Route::add("get","/",[Controller::class, "sayHi"]);

Route::run();