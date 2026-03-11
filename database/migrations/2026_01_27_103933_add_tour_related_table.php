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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->integer('day'); // Day number
            $table->string('title'); // e.g. "Arrival in Bali"
            $table->text('description')->nullable(); // details of the day
            $table->timestamps();
        });
        Schema::create('inclusions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->string('text'); // e.g. "Free Breakfast"
            $table->timestamps();
        });
        Schema::create('exclusions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->string('text'); // e.g. "International Flights"
            $table->timestamps();
        });
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->text('cancellation')->nullable();
            $table->text('refund')->nullable();
            $table->text('other_rules')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
