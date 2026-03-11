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
        Schema::create('packages', function (Blueprint $table) { 
            $table->id(); 
            $table->string('name'); 
            $table->string('slug')->unique(); 
            $table->decimal('price', 10, 2); 
            $table->text('description')->nullable(); 
            $table->timestamps(); 
        }); 
        
        Schema::create('package_room', function (Blueprint $table) { 
            $table->id(); 
            $table->foreignId('package_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('room_id')->constrained()->cascadeOnDelete(); 
        }); 
        
        Schema::create('package_tour', function (Blueprint $table) { 
            $table->id(); 
            $table->foreignId('package_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('tour_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_new');
    }
};
