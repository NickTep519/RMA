<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Admin\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'property' => $property
        ]) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        Property::create($request->validated()) ; 

        return to_route('admin.properties.index')->with('success', 'Le bien a été bien ajouter') ; 
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            '$property' => $property
        ]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated()) ; 

        return to_route('admin.properties.index')->with('success', 'Le bien a été bien mis à jour') ; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete() ; 

        return to_route('admin.properties.index')->with('success', 'Le bien a été bien supprimé') ; 
    }
}
