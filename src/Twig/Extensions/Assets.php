<?php 

namespace Src\Twig\Extensions;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Assets extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction("js",[$this,"js"]),
            new TwigFunction("css",[$this,"css"]),
            new TwigFunction("image",[$this,"images"])
        ];
    }
    public function js(string $filename) : string 
    {
        return "/assets/scripts/$filename.js";
    }
    public function css(string $filename) : string 
    {
        return "/assets/styles/$filename.css";
    }
    public function images(string $filename) : string 
    {
        return "/assets/images/$filename";
    }
}