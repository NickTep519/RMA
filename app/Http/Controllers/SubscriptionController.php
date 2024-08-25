<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubscriptionController extends Controller
{
    public function index() {
        
        return view('subscribe') ; 
    }

    public function subscribe(Request $request)
    {
        $user = User::find(Auth::user()->id) ;

        $plan = $request->input('plan');

        $amount = 0;
        $endDate = NULL ;

        switch ($plan) {
            case 'pay_per_listing':
                $amount = 500;
                break;
            case 'monthly':
                $amount = 2500;
                $endDate = now()->addMonth();
                break;
            case 'yearly':
                $amount = 20500;
                $endDate = now()->addYear();
                break;
            default:
                return redirect()->back()->with('error', 'Plan d\'abonnement non valide.');
        } 


        $subscription = $user->subscriptions()->create([
            'plan' => $plan,
            'start_at' => now(),
            'end_at' => $endDate,
        ]) ;





        

        //

        return redirect()->route('home.index')->with('message', 'Abonnement réussi!');
    }
}
