<?php

namespace App\Http\Controllers;

use App\Http\SlimBase;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends SlimBase
{
    /**
     * Index.
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Array $args
     */
    public function homepage(Request $request, Response $response)
    {
        return $this->view->render($response, 'homepage.twig');
    }
}