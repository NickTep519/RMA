<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemarcheursController extends Controller
{
    public function index(Request $request){

        $users = User::query() ; 

        if ($request->filled('user')) {
            $users->where('name', 'like', "%{$request->user}%") ; 
        }
        if (Auth::check()) {
            $user_id = Auth::id() ; 
            $users->where('id', '!=', $user_id) ; 
        }
        $users = $users->paginate(7) ; 
        return view('demarcheurs.index', [
            'users'=> $users
        ]) ; 
    }


    public function show( User $user){

        if (Auth::id()==$user->id) {
            return to_route('dashboard') ; 
        }
         
        $properties = Property::query()->where('user_id', $user->id)->paginate(5) ; 

        return view('demarcheurs.show', [
            'user' =>$user,
            'properties' => $properties
        ]) ; 

    }
}
