<?php

namespace App\Http\Controllers;

use App\Http\SlimBase;
use App\Traits\Responsable;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ApiController extends SlimBase
{
    use Responsable;

    /**
     * Index.
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Array $args
     */
    public function index(Request $request, Response $response, Array $args = [])
    {
        $result = $this->pdoMysql->prepare('
            SELECT * FROM (
                (SELECT AMP.NM AS PRODUCT_NAME FROM AMP LIMIT 1)
                    UNION ALL 
                (SELECT VMP.NM AS PRODUCT_NAME FROM VMP LIMIT 1)
            ) AS MERGED_TABLE
        ');

        return $response->withJson($this->response($result), 201);
    }
}
