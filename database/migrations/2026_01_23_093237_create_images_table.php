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
        Schema::create('images', function (Blueprint $t) { 
            $t->id();
            $t->tinyInteger('type');
            $t->unsignedBigInteger('type_id'); 
            $t->string('url'); 
            $t->string('alt')->nullable(); 
            $t->unsignedInteger('sort')->default(0); 
            $t->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
