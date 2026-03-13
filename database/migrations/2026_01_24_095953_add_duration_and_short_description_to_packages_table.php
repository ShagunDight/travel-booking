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
        Schema::table('packages', function (Blueprint $table) { 
            $table->string('location');
            $table->string('duration')->nullable(); // e.g. "5 Days / 4 Nights" 
            $table->text('short_description')->nullable(); // short summary 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) { 
            $table->dropColumn(['location','duration','short_description']); 
        });
    }
};
