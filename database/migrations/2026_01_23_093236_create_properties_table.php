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
        Schema::create('properties', function (Blueprint $t) { 
            $t->id(); 
            $t->foreignId('city_id')->constrained()->cascadeOnDelete(); 
            $t->string('name'); 
            $t->string('slug')->unique(); 
            $t->string('address')->nullable();
            $t->string('search_address')->nullable();
            $t->text('about')->nullable(); 
            $t->decimal('rating_avg', 3, 2)->default(0);
            $t->unsignedInteger('rating_count')->default(0); 
            $t->json('policies')->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
