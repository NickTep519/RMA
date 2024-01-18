<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Property;
use App\Models\Admin\Specificity;
use App\Models\City;
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
        ]) ; 


        $cities = City::factory(77)->create() ; 

        $specificities = Specificity::factory(20)->create() ; 

        $specificities->each(function($specificity) use ($users) {
            $specificity->user()->associate($users->random()) ; 
        }) ; 

        $specificities->each->save() ; 

        Property::factory(100)->create()->each(function($property) use ($users, $cities, $specificities) {
            $property->user()->associate($users->random()) ; 
            $property->city()->associate($cities->random()) ; 
            $property->save() ; 
            
            $property->specificities()->sync($specificities->random(3)->pluck('id')->toArray())  ; 
            

        }) ; 
        
    }
}