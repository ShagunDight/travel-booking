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
        Schema::create('bookings', function (Blueprint $table) { 
            $table->id(); 
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            $table->unsignedBigInteger('bookable_id'); 
            $table->string('bookable_type'); 
            $table->json('traveler_details')->nullable();
            $table->date('check_in')->nullable(); 
            $table->date('check_out')->nullable(); 
            $table->date('booking_date')->nullable(); 
            $table->unsignedInteger('guests')->default(1); 
            $table->decimal('amount', 10, 2); 
            $table->enum('status', ['pending','confirmed','cancelled'])->default('pending'); 
            $table->json('meta')->nullable(); 
            $table->timestamps(); 
            $table->index(['bookable_id','bookable_type']); });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
