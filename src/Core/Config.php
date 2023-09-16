<?php declare(strict_types=1);

namespace Src\Core;

class Config 
{    
    /**
     * Method database
     *
     * @return array
     */
    public static function database() : array 
    {
        return require(APP_ROOT . "config/database.php");
    }
    public static function commands() : array 
    {
        return require(APP_ROOT . "config/commands.php");
    }
}