<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DemarcheursController extends Controller
{
    public function index(){

        return view('demarcheurs.index') ; 
    }


    public function show( User $user){
        
        return view('demarcheurs.show', [
            'user' =>$user
        ]) ; 

    }
}
