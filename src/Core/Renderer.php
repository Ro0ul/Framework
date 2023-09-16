<?php declare(strict_types=1);

namespace Src\Core;

interface Renderer
{
    public function render($template, $data = []) : string;
}