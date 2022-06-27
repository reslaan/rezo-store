<?php

namespace App\Http\Middleware;

use App\Http\Services\VerificationService;
use Closure;

class IsVerified
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
        if (auth()->user()->isVerified){
            return $next($request);
        }else{
            (new VerificationService)->setOtpCode();
            return redirect()->route('auth.verifyCode');
        }

    }
}
