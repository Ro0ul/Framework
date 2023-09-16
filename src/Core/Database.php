<?php declare(strict_types=1);

namespace Src\Core;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

/**
 * @mixin Connection
 * 
 * Using MySQL per default
 */
class Database 
{
    private Connection $conn;
    public function __construct(array $connectionParams)
    {
        $config = $connectionParams["connections"]["mysql"];
        $this->conn = DriverManager::getConnection($config);
    }
    public function __call(string $name, array $arguments = [])
    {
        return call_user_func_array([$this->conn,$name],$arguments);
    }
}