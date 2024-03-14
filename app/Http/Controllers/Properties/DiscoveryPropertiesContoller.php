<?php

namespace App\Http\Controllers\Properties;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchPropertyRequest;
use App\Models\Admin\Property;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class DiscoveryPropertiesContoller extends Controller
{
    public function index(SearchPropertyRequest $request) {

        $query = Property::query() ; 
        $data = $request->validated() ; 

        if($request->filled('price')) {
            $query = $query->where('price', '<=', $data['price']) ; 
        }
        if ($request->filled('city')) {
            $query = $query->where('city_id', $data['city']) ; 
        }
        if ($request->filled('neighborhood')) {
            $query = $query->where('neighborhood', 'like', "%{$data['neighborhood']}%") ; 
        }
        if ($request->filled('title')) {
            $query = $query->where('title', 'like', "%{$data['title']}%" ) ; 
        }

        $properties = $query->paginate(25) ; 

        
        return view('properties.index', [
            'properties' => $properties,
            'cities' => City::pluck('name_city', 'id'),
            'values' => $data
        ]) ; 

    }


    public function show(string $slug, Property $property ) {

        return view('properties.show', [
            'property' => $property
        ]) ; 
    }
}
