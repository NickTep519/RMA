<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Admin\Property;
use App\Models\City;
use App\Models\Image;
use App\Service\ImagePathGenerator;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $property = new Property() ; 
        $images = new Image() ; 

        $property->fill([
            'title' => 'Titre du bien',
            'description' => 'Detail sur le bien',
            'surface' => 10,
            'rooms'  => 1,
            'bedrooms' => 0,
            'floor' => 0,
            'price' => 8000,
            'neighborhood' => 'Tanpkè',
            'sold' => false,
            'rent_advance' => 3,
            'rent_prepaid'=> 3,
            'cee'=> 50000,
            'commission'=> 50000,
            'visit_fees'=>3000
        ]) ; 

        return view('managers.properties.form', [
            'property' => $property,
            'cities' => City::pluck('name_city', 'id'),
            'images' => $images->query()->where('id', 0)->get()
        ]) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Filesystem $filesystem, PropertyFormRequest $request)
    {
        $user_id = Auth::user()->id ; 
        $datas = $request->validated() ; 
        $data = collect($datas)->except('city')->all() ;  

        $property = Property::create($data) ; 

        $city = City::find($datas['city']) ; 
        $property->city()->associate($city) ; 
        $property->user_id = $user_id ; 
        $property->save() ;

        
        $images = $request->validated('images') ; 
        
        /** @var UploadedFile */

        foreach ($images as $image) {

            if (!$image->getError()) {

                $img = $image->store() ;
                $path = Storage::path($img) ; 
 
                $imgg = new Image() ; 
                $imgg->name = app(ImagePathGenerator::class)->generate($path, 200, 200) ; 
                $imgg->base_name = $img ; 
                $imgg->property()->associate($property) ; 
                $imgg->save() ; 
            }
 
        }

        return to_route('dashboard')->with('success', 'Le bien a été bien AJOUTE') ; 
    }


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Property $property)
    {
        return view('managers.properties.form', [
            'property' => $property,
            'cities' => City::pluck('name_city', 'id'),
            'images' => Image::where('property_id', $property->id)->get() 
        ]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Filesystem $filesystem, PropertyFormRequest $request, Property $property)
    {
        $user_id = Auth::user()->id ; 
        $datas = $request->validated() ; 
        $data = collect($datas)->except('city')->all() ;  

        $property->update($data) ; 

        $city = City::find($datas['city']) ; 
        $property->city()->associate($city) ; 
        $property->user_id = $user_id ; 
        $property->save() ;

        
        $images = $request->validated('images') ; 
        
        /** @var UploadedFile */

        if ($request->hasFile('images')) {

            foreach ($images as $image) {

                if (!$image->getError()) {
    
                    $img = $image->store() ;
                    $path = basename($img) ;
     
                    $imgg = new Image() ; 
                    $imgg->name = app(ImagePathGenerator::class)->generate($path, 200, 200) ; 
                    $imgg->base_name = $img ; 
                    $imgg->property()->associate($property) ; 
                    $imgg->save() ; 
                }
             
            }

        }   

        return to_route('dashboard')->with('success', 'Le bien a été bien MODIFIE') ; 
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
