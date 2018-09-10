<?php

namespace App\Http\Middlewares;

use App\Http\SlimBase;

class CorsMiddleware extends SlimBase
{
    public function __invoke($request, $response, $next) {
        $response = $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
   
        return $next($request, $response);    
    }
}
