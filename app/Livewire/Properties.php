<?php

namespace App\Livewire;

use App\Models\Admin\Property;
use App\Models\City;
use Livewire\Component;

class Properties extends Component
{

    public $price = '' ; 
    public $city = 0 ; 
    public $neighborhood = '' ; 
    public $type = '' ; 

    protected $queryString = [
        'price' => ['except' => ''],
        'city',
        'neighborhood' => ['except'=> ''],
        'type' => ['except' => '']
    ] ; 


    public function render()
    {
        $query = Property::where('price','<=', $this->price)->
                        where('neighborhood', 'LIKE', "%{$this->neighborhood}%")-> 
                        where('title', 'LIKE', "%{$this->type}%") ; 

        if ($this->city !== 0) {
            $query->where('city_id', $this->city) ; 
        }

        return view('livewire.properties', [
            'cities' => City::pluck('name_city', 'id'),
            'properties' =>  $query->paginate(25)
        ]);
    }
}

