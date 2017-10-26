<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $domain = ['http://127.0.0.1:3000']; // 这便是你需要跨域请求的地址！
        // if(isset($request->server()['HTTP_ORIGIN'])){
        //     $origin = $request->server()['HTTP_ORIGIN'];
        //     if(in_array($origin, $domain)){
        //         header('Access-Control-Allow-Origin:' . $origin);
        //         header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, x-requested-with');
        //     }
        // }
        // return $next($request);
        // 写法一
        // $response = $next($request);
        // $response->header('Access-Control-Allow-Origin', '*');
        // $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
        // $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        // $response->header('Access-Control-Allow-Credentials', 'false');
        // $response->header("Content-type:text/html charset","utf-8");
        // return $response;
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
        return $next($request);

        // $response = $next($request);
        // $response->header('Access-Control-Allow-Origin', '*');
        // $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
        // $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        // $response->header('Access-Control-Allow-Credentials', 'false');
        // return $response;
    }
}
