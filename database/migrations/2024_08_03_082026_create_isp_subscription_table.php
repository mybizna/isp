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
        Schema::create('isp_subscription', function (Blueprint $table) {
            $table->id();

            $table->foreignId('subscriber_id')->constrained('isp_subscriber')->onDelete('cascade')->index('subscriber_id');
            $table->foreignId('package_id')->constrained('isp_package')->onDelete('cascade')->index('package_id');
            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_subscription');
    }
};
