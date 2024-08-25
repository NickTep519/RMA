<?php

namespace App\Http\Controllers\Properties;

use App\Models\City;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchPropertyRequest;
use App\Models\Image;

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

        $properties = $query->with(['city', 'user'])->where('sold', false)->paginate(25) ; 

        return view('properties.index', [
            'properties' => $properties,
            'cities' => City::pluck('name_city', 'id'),
            'values' => $data
        ]) ; 

    }


    public function show(string $slug, Property $property ) {

//        $property = $property->with('user')->get() ; 

        return view('properties.show', [
            'property' => $property,
            'images' => Image::where('property_id', $property->id)->get()
        ]) ; 
    }
}
