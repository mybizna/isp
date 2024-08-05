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
        Schema::create('isp_billing_cycle', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('duration')->nullable();
            $table->enum('duration_type', ['day', 'week', 'month', 'year'])->default('month')->nullable();
            $table->boolean('published')->default(true)->nullable();


    
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_billing_cycle');
    }
};
