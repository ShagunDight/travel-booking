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
        Schema::create('tours', function (Blueprint $table) { 
            $table->id(); 
            $table->string('name'); // Tour name 
            $table->string('slug')->unique(); // Unique slug 
            $table->string('starting_location'); // Location name 
            $table->string('location'); // Location name 
            $table->decimal('price', 10, 2); // Price 
            $table->text('description')->nullable(); // Optional description 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
