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
        Schema::create('rooms', function (Blueprint $t) { 
            $t->id(); 
            $t->foreignId('property_id')->constrained()->cascadeOnDelete(); 
            $t->string('name'); 
            $t->unsignedInteger('capacity')->default(2); 
            $t->decimal('price_per_night', 10, 2); 
            $t->boolean('refundable')->default(true); 
            $t->date('free_cancel_until')->nullable(); 
            $t->json('features')->nullable(); // ["Air Conditioning","Wi-Fi","Kitchen"] 
            $t->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
