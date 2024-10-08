<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $plan = null ; 

        $user = User::find(Auth::user()->id) ; 
        $subscription = $user->subscriptions()->latest()->first();

        /*$property = $subscription->properties()->latest()->first() ; 
        if ($property) {
            $plan = $property->subscription()->plan ; 
        }*/

        if (!$subscription || Carbon::now()->greaterThan($subscription->end_at) ) {
            return redirect('/subscribe')->with('subscribe', 'Vous devez avoir un abonnement actif pour créer un bien.') ;    
        }
             

        return $next($request);
    }
}
