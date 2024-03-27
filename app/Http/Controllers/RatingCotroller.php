<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Rating;
use App\Models\User;

class RatingCotroller extends Controller
{
    public function rateUser(RatingRequest $request, User $user) {

        $existingRating = Rating::where('user_id', $user->id)
                            ->where('ip_adress', $request->ip()) 
                            ->first() ; 

        if ($existingRating) {
            return back()->with('error_rating', 'Vous avez déjà noté cet utilisateur. ') ; 
        }

        /*Rating::create([
            'user_id' => $user->id,
            'ip_adress' => $request->ip(),
            'rating' => $request->validated('note')
        ]) ; */
        $rating = new Rating() ; 
        $rating->user_id = $user->id ;
        $rating->ip_adress = $request->ip() ; 
        $rating->rating = $request->validated('note') ; 
        $rating->save() ; 

        $query = Rating::where('user_id', $user->id) ; 
        $rates = $query->get() ; 

        $somme = 0 ; 
        foreach ($rates as $rate) {
            $somme += $rate->rating ; 
        }

        if ($query->count() == 0) {
            $user->moyenne_rating = 0 ;  
        }

        $user->moyenne_rating = $somme/$query->count() ; 
        $user->save() ; 

        return back()->with('success_rating', 'Merci !!! ') ; 
    }
}
