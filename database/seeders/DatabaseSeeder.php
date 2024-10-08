<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actuality;
use App\Models\Admin\Property;
use App\Models\Admin\Specificity;
use App\Models\City;
use App\Models\Contract;
use App\Models\Image;
use App\Models\Rental;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = User::factory(10)->create() ; 

       
        Actuality::factory(8)->create() ;  
        $cities = City::factory(189)->create() ; 


        $properties = Property::factory(100)->create()->each(function($property) use ($users, $cities) {
            $property->user()->associate($users->random()) ; 
            $property->city()->associate($cities->random()) ; 
            $property->save() ; 
            
        }) ; 

        $rentals = Rental::factory(300)->create() ; 

        $contracts = Contract::factory(150)->create()->each(function($contract) use ($users, $properties, $rentals){

            $user = $users->random() ; 
            
            $contract->rentals()->saveMany($rentals->random(9))  ; 
            $contract->user()->associate($user) ; 
            $contract->property()->associate($properties->where('user_id', $user->id)->first()) ; 
            $contract->save() ; 
        }) ; 
        
    }
}