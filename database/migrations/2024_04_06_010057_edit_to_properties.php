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
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('rent_advance')->nullable() ; 
            $table->integer('rent_prepaid')->nullable() ; 
            $table->integer('cee')->nullable() ; 
            $table->integer('commission')->nullable() ; 
            $table->integer('visit_fees')->nullable() ; 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('rent_advance') ; 
            $table->dropColumn('rent_prepaid') ; 
            $table->dropColumn('cee') ; 
            $table->dropColumn('commission') ; 
            $table->dropColumn('visit_fees') ; 
        });
    }
};
