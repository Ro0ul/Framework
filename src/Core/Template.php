<?php declare(strict_types=1);

namespace Src\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Template 
{
    private Environment $twig;
    public function __construct(FilesystemLoader $loader)
    {
        $this->twig = new Environment($loader);
    }
    public function __call(string $name, array $arguments = [])
    {
        return call_user_func_array([$this->twig,$name],$arguments);
    }

}