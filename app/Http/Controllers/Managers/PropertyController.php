<?php

namespace App\Http\Controllers\Managers;

use App\Models\City;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Admin\Property;
use Illuminate\Http\UploadedFile ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\PropertyFormRequest;

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
            'images' => $images->query()->where('id', 0)->get(),
         ]) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {

        $user_id = Auth::user()->id ; 

        $user = User::find($user_id) ; 
        $subscription = $user->subscriptions()->latest()->first();

        $datas = $request->validated() ; 
        $data = collect($datas)->except('city')->all() ;  

        $property = Property::create($data) ; 

        $city = City::find($datas['city']) ; 
        $property->city()->associate($city) ; 
        $property->user()->associate($user) ; 
        $property->subscription()->associate($subscription) ; 
        $property->save() ;

        $images = $request->validated('images') ; 
        
        if ($request->hasFile('images')) {

            foreach ($images as $image) {
    
                if (!$image->getError() && Image::where('property_id', $property->id)->count() < 6) {
                     
                    /** @var UploadedFile */
    
                    $imageName = 'image_property_'. $property->id .'_'. Str::random(10) .'_'. time() .'.' .$image->getClientOriginalExtension() ; 
    
                    $img = Image::create([
                         'name' => $image->storeAs('', $imageName )
                    ])->property()->associate($property) ; 
                     
                    $img->save()  ; 
                }
            } 
       
        }

        return to_route('dashboard')->with('success', 'Le bien a été bien AJOUTE') ; 
    }


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Property $property)
    {

        if (! Gate::allows('update-property', $property)) {
            abort(403);
        }

        return view('managers.properties.form', [
            'property' => $property,
            'cities' => City::pluck('name_city', 'id'),
            'images' => Image::where('property_id', $property->id)->get() 
        ]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {

        if (! Gate::allows('update-property', $property)) {
            abort(403);
        }


        $user_id = Auth::user()->id ; 
        $datas = $request->validated() ; 
        $data = collect($datas)->except('city')->all() ;  

        $property->update($data) ; 

        $city = City::find($datas['city']) ; 
        $property->city()->associate($city) ; 
        $property->user_id = $user_id ; 
        $property->save() ;

        
        $images = $request->validated('images') ; 
        

        if ($request->hasFile('images')) {

            foreach ($images as $image) {
    
                if (!$image->getError() && Image::where('property_id', $property->id)->count() < 6) {
                     
                    /** @var UploadedFile */
    
                    $imageName = 'image_property_'.$property->id.'_'. Str::random(10) .'_'. time() .'.' .$image->getClientOriginalExtension() ; 
    
                    $img = Image::create([
                         'name' => $image->storeAs('', $imageName )
                    ])->property()->associate($property) ; 
                     
                    $img->save()  ; 
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
