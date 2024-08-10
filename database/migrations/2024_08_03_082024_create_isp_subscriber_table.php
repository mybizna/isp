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
        Schema::create('isp_subscriber', function (Blueprint $table) {
            $table->id();

            $table->string('username');
            $table->string('password');
            $table->boolean('had_trail')->default(0)->nullable();
            $table->foreignId('partner_id')->constrained('partner_partner')->onDelete('cascade')->nullable()->index('isp_subscriber_partner_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_subscriber');
    }
};
