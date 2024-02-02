<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        $properties = Property::with('city')->orderBy('created_at', 'desc')->limit(9)->get() ; 

        return view('home', [
            'properties' => $properties
        ]) ; 
    }
}
