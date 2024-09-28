<?php

namespace App\Http\Middleware;

use App\Helper\JwtToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $signInToken = $request->cookie('userSignInToken');
        $result = JwtToken::decodeToken($signInToken);

        if($result == "Unauthorized"){
            return redirect()->route('user.sign-in')->with('error', 'Unauthorized');
        }else{
            $user = User::where('id',  $result->id)->where('email', $result->email)->first();

            if($user->role == 'customer'){
                $request->headers->set('customerEmail', $result->email);
                $request->headers->set('customerId', $result->id);
                return $next($request);
            } else{
                return redirect()->route('user.sign-in')->with('error', 'Unauthorized');
            }
        }
    }
}
