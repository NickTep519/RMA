<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actuality;
use App\Models\Admin\Property;
use App\Models\Admin\Specificity;
use App\Models\City;
use App\Models\Image;
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
        $userNick = User::factory()->create([
            'name' => 'Nick Tep',
            'email' => 'nicktep519@gmail.com',
            'phone' => '+229 65372714'
        ]) ; 

       
        $actualities = Actuality::factory(8)->create() ;  
        $cities = City::factory(189)->create() ; 


        $properties = Property::factory(100)->create()->each(function($property) use ($users, $cities) {
            $property->user()->associate($users->random()) ; 
            $property->city()->associate($cities->random()) ; 
            $property->save() ; 
            
        }) ; 

        $images = Image::factory(100)->create()->each(function($image) use ($properties){
            $image->property()->associate($properties->random()) ; 
            $image->save() ; 
        }) ; 

        $tenants = Tenant::factory(150)->create()->each(function($tenant) use ($users, $properties){
            $tenant->user()->associate($users->random()) ; 
            $tenant->property()->associate($properties->random()) ; 
            $tenant->save() ; 
        }) ; 
        
    }
}