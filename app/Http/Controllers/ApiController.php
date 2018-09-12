<?php

namespace App\Http\Controllers;

use App\Http\SlimBase;
use App\Traits\{Responsable, Queries};
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ApiController extends SlimBase
{
    use Responsable, Queries;

    /**
     * Index.
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Array $args
     */
    public function index(Request $request, Response $response, Array $args = [])
    {
        $result = $this->pdoMysql->prepare($this->select('AMP'));

        return $response->withJson($this->response($result), 200);
    }
}
