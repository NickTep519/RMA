<?php

namespace App\Http\Controllers\Managers ;

use App\Http\Controllers\Controller;
use App\Models\Admin\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagersController extends Controller
{
    public function index(Request $request){

        $users = User::query() ; 

        if ($request->filled('user')) {
            $users->where('name', 'like', "%{$request->user}%") ; 
        }

        $users = $users->paginate(7) ; 
        
        return view('managers.index', [
            'users'=> $users
        ]) ; 
    }


    public function show( User $user){

        if (Auth::id()==$user->id) {
            return to_route('dashboard') ; 
        }
         
        $properties = Property::query()->where('user_id', $user->id)->paginate(5) ; 

        return view('managers.show', [
            'user' =>$user,
            'properties' => $properties
        ]) ; 

    }
}
