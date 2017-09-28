<?php

namespace Apoyo\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class Supervisor
{
    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
       // return $next($request);
    }
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->supervisor()){

             return $next($request);

        }else{
          abort(401);
        }
       
    }
}
