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
        Schema::create('taxi_inquiries', function (Blueprint $table) { 
            $table->id(); 
            $table->string('name'); 
            $table->string('number'); // contact number 
            $table->enum('trip_type', ['one_way', 'round_trip'])->default('one_way'); 
            $table->string('pickup')->nullable(); 
            $table->string('drop')->nullable(); 
            $table->date('pickup_date')->nullable(); 
            $table->time('pickup_time')->nullable(); 
            $table->date('return_date')->nullable(); 
            $table->time('return_time')->nullable(); 
            $table->text('message')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi_inquiries');
    }
};
