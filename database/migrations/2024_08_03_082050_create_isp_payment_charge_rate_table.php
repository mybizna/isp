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
        Schema::create('isp_payment_charge_rate', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_charge_id')->constrained('isp_payment_charge')->onDelete('cascade')->index('payment_charge_id');
            $table->foreignId('rate_id')->constrained('account_ledger')->onDelete('cascade')->index('rate_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_payment_charge_rate');
    }
};
