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
        Schema::create('isp_package_charge_rate', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_charge_id')->constrained('isp_package_charge')->onDelete('cascade')->index('isp_package_charge_rate_payment_charge_id');
            $table->foreignId('rate_id')->constrained('account_rate')->onDelete('cascade')->index('isp_package_charge_rate_rate_id');
            $table->boolean('published')->default(true)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_package_charge_rate');
    }
};
