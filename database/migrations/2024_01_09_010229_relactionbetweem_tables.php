<?php

use App\Models\Admin\Property;
use App\Models\Admin\Specificity;
use App\Models\City;
use App\Models\User;
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
        Schema::table('properties', function(Blueprint $table){
            $table->foreignIdFor(City::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete() ; 
        }) ; 

        Schema::create('property_specificity', function(Blueprint $table){
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete() ; 
            $table->foreignIdFor(Specificity::class)->constrained()->cascadeOnDelete() ; 
            $table->primary(['property_id', 'specificity_id']) ; 
        }) ; 

        Schema::table('users', function(Blueprint $table){
            $table->string('phone')->nullable() ; 
        }) ; 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function(Blueprint $table){
            $table->dropForeignIdFor(City::class) ; 
            $table->dropForeignIdFor(User::class) ; 
        }) ; 

        Schema::dropIfExists('property_specificity') ; 

        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('phone') ; 
        }) ; 
    }
};
