<?php

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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('plan') ; 
            $table->date('start_at')->nullable() ; 
            $table->date('end_at')->nullable() ; 
            $table->timestamps();

            $table->foreignIdFor(User::class)->constrained()->naullable()->cascadeOnDelete() ; 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
