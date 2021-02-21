<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
class IsSuper
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
        $auth=\Auth::user();
        //Log::info($auth);
        $auth=\Auth::user();//echo "<pre>";print_r($auth->isSuper);
        if($auth->isSuper!=1){
            //return redirect('admin/sub_admin');
            echo 234;die();
        }
        return $next($request);
    }
}
