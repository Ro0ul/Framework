<?php declare(strict_types = 1);

namespace Src\Error;

error_reporting(E_ALL);

$environment = $_ENV["APP_ENV"];

$whoops = new \Whoops\Run;
if ($environment == 'DEV') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
$whoops->register();