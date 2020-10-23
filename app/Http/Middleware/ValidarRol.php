<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ValidarRol
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
        $user = Auth::user();
        $permisos = User::$permisos[$user->rol];
        $url = $request->getRequestUri();
        $url_exp = explode("?", $url)[0]; 

        $filtro = array_filter($permisos, function($item) use ($url_exp, $request){
            if(strpos($url_exp, $item["url"]) !== false){
                if($request->isMethod($item["method"])){
                    if($item["identica"]){
                        if($item["url"] == $url_exp){
                            return true;
                        }
                    }else{
                        return true;
                    }                    
                }
            }
            return false;
        });

        if(count($filtro) == 0){
            return redirect("home");
        }

        return $next($request);
    }
}
