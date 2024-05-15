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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name') ;
            $table->string('tenant_phone') ; 
            $table->unsignedInteger('npi') ; 
            $table->string('profession') ; 
            $table->integer('rent') ; 
            $table->unsignedInteger('contract_number')->unique() ; 
            $table->timestamps();

            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->foreignIdFor(Property::class)->nullable()->constrained()->cascadeOnDelete() ; 

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
