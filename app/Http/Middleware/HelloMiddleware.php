<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        //before action
        /*
        $data=[['name'=>'taro','mail'=>'taro@mail'],['name'=>'jiro','mail'=>'jiro@mail']];
        $request->merge(['data'=>$data]);
        return $next($request);
        */

        //after action
        $response=$next($request);
        $content=$response->content();

        //正規表現の置換
        $pattern='/<middleware>(.*)<\/middleware>/i';
        $replace='<a href="http://$1">$1</a>';
        $content=preg_replace($pattern,$replace,$content);

        $response->setContent($content);
        return $response;
    }
}
