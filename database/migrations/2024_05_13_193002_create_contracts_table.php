<?php

use App\Models\User;
use App\Models\Admin\Property;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name') ;
            $table->string('tenant_phone') ; 
            $table->unsignedInteger('idl')->unique()->nullable() ; 
            $table->unsignedInteger('npi') ; 
            $table->string('profession') ; 
            $table->integer('rent') ; 
            $table->timestamp('integration_date')->nullable() ; 
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->foreignIdFor(Property::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
