<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
use Illuminate\Http\Request;

class DiscoveryPropertiesContoller extends Controller
{
    public function index() {

        $properties = Property::query() ; 

        $properties = $properties->paginate(25) ; 

        
        return view('properties.index', [
            'properties' => $properties
        ]) ; 

    }


    public function show() {

    }
}
