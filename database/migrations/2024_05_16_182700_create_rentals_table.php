<?php

use App\Models\Contract;
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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->timestamp('month') ; 
            $table->enum('payment_status', ['on_hold', 'paid', 'late'])->default('on_hold') ; 
            $table->enum('prev_payment_status', ['paid', 'late'])->default('late') ; 
            $table->timestamps();

            $table->foreignIdFor(Contract::class)->nullable()->constrained()->cascadeOnDelete() ; 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
