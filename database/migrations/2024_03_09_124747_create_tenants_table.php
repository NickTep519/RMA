<?php

use App\Models\Admin\Property;
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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name') ; 
            $table->integer('rent') ; 
            $table->timestamps();
        });

        Schema::table('tenants', function(Blueprint $table){
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->foreignIdFor(Property::class)->nullable()->constrained()->cascadeOnDelete() ; 
        }) ; 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('tenants', function(Blueprint $table){
            $table->dropForeignIdFor(User::class) ; 
            $table->dropForeignIdFor(Property::class) ; 
        }) ; 
        
        Schema::dropIfExists('tenants');
    }
};
