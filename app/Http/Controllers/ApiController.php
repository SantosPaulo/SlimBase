<?php

namespace App\Http\Controllers;

use App\Http\SlimBase;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\VTM;

class ApiController extends SlimBase
{
    /**
     * Index.
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Array $args
     */
    public function index(Request $request, Response $response, Array $args = [])
    {
        $pdo = $this->pdoMysql->prepare('SELECT * FROM VTM LIMIT 10');

        return $response->withJson([ 'vtm' => $pdo ], 200);
    }
}
