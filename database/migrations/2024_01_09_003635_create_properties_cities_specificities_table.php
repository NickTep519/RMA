<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title') ; 
            $table->longText('description') ; 
            $table->integer('surface') ; 
            $table->integer('rooms') ; // nbr de pieces
            $table->integer('bedrooms') ;  //nbr de chambres
            $table->integer('floor') ;  // n° d'etage
            $table->integer('price') ; 
            $table->string('neighborhood') ; // quartier
            $table->boolean('sold') ; 
            $table->timestamps();
        });


        Schema::create('cities', function(Blueprint $table){
            $table->id() ; 
            $table->string('name_city') ; 
            $table->timestamps() ; 
        }) ; 

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties') ;
        Schema::dropIfExists('cities') ; 
    }
};
