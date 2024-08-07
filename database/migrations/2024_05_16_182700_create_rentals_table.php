<?php

use App\Models\Contract;
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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->timestamp('month') ; 
            $table->enum('payment_status', ['En attente', 'Payé ✔️', 'En retard ❌'])->default('En attente') ; 
            $table->enum('prev_payment_status', ['En retard ❌', 'Payé ✔️'])->default('late') ; 
            $table->foreignIdFor(Contract::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->timestamps();

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
