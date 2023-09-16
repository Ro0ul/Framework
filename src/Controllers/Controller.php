<?php declare(strict_types=1);

namespace Src\Controllers;

use Src\Core\Template;
use Src\Http\Request;
use Src\Http\Response;
use Src\Twig\Extensions\Assets;

class Controller 
{

    public function __construct(
        private Response $response,
        private Request $request,
        private Template $template
    ){

    }
    public function sayHi() 
    {
        $this->template->addExtension(new Assets);
        $this->response->setContentBody($this->template->render("index.twig"));
        echo $this->response->getContentBody();
    }
}