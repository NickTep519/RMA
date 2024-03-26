<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Rating;
use App\Models\User;

class RatingCotroller extends Controller
{
    public function rateUser(RatingRequest $request, User $user) {

        $existingRating = Rating::where('user_id', $user)
                            ->where('ip_adress', $request->ip()) 
                            ->first() ; 

        if ($existingRating) {
            return back()->with('error_rating', 'Vous avez déjà noté cet utilisateur. ') ; 
        }

        $rating = new Rating() ; 
        $rating->user_id = $user ;
        $rating->ip_adress = $request->ip() ; 
        $rating->rating = $request->validated('rating') ; 
        $rating->save() ; 

        return back()->with('success_rating', 'Merci de m\'avoir noté') ; 
    }
}
