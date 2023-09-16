<?php declare(strict_types=1);

namespace Src\Core;

use \FastRoute\RouteCollector;
use \FastRoute\Dispatcher;
use DI\ContainerBuilder;
use Closure;

class Route 
{    
    private static array $routes = [];
    public static function add(string $method, string $url, callable | array | Closure $handler) : void 
    {
        $method = strtoupper($method);
        static::$routes[] = [$method,$url,$handler];
    }
    public static function run() 
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        $dispatcher = \FastRoute\simpleDispatcher(function(RouteCollector $r) {
            foreach(static::$routes as $route){
                $r->addRoute($route[0],$route[1],$route[2]);
            }
        });

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo "not found";
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo "not Allowed";
                break;
            case Dispatcher::FOUND:
                $className = $routeInfo[1][0];
                $handler = $routeInfo[1][1];
                $vars = $routeInfo[2];
                $builder = new ContainerBuilder();
                $container = $builder->build();
                $class = $container->get($className);
                $class->$handler($vars);
                break;
        }
    }
}       