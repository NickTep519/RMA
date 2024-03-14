<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Admin\Property;
use App\Models\Admin\Specificity;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user_id = Auth::user()->id ; 

        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->with('city')->paginate(16)
        ]) ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property() ; 

        $property->fill([
            'title' => 'Titre du bien',
            'description' => 'Plus de Detail sur le bien',
            'surface' => 10,
            'rooms'  => 1,
            'bedrooms' => 0,
            'floor' => 0,
            'price' => 8000,
            'neighborhhod' => 'Tanpkè',
            'sold' => false
        ]) ; 

        return view('admin.properties.form', [
            'property' => $property,
            'specificities' => Specificity::pluck('name_speci', 'id'),
            'cities' => City::pluck('name_city', 'id')
        ]) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $user_id = Auth::user()->id ; 
        $datas = $request->validated() ; 
        $data = collect($datas)->except(['specificities', 'city'])->all() ;  

        $property = Property::create($datas) ; 

        $city = City::find($datas['city']) ; 
        $property->city()->associate($city) ; 
        $property->user_id = $user_id ; 
        $property->save() ; 

        $property->specificities()->sync($datas['specificities']) ; 

        return to_route('admin.properties.index')->with('success', 'Le bien a été bien ajouter') ; 
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'specificities' => Specificity::pluck('name_speci', 'id'),
            'cities' => City::pluck('name_city', 'id')
        ]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $datas = $request->validated() ; 
        $data = collect($datas)->except(['specificities', 'city'])->all() ;  

        $property->update($datas) ; 

        $city = City::find($datas['city']) ; 
        $property->city()->associate($city) ; 
        $property->save() ; 

        $property->specificities()->sync($datas['specificities']) ;

        return to_route('admin.properties.index')->with('success', 'Le bien a été bien mis à jour') ; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete() ; 

        return to_route('dashboard')->with('success', 'Le bien a été bien supprimé') ; 
    }
}
