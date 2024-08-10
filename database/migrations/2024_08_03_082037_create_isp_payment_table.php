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
        Schema::create('isp_payment', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->foreignId('subscription_id')->constrained('isp_subscription')->onDelete('cascade')->nullable()->index('isp_payment_subscription_id');
            $table->foreignId('invoice_id')->constrained('account_invoice')->onDelete('cascade')->nullable()->index('isp_payment_invoice_id');
            $table->string('description')->nullable();
            $table->boolean('is_paid')->default(0)->nullable();
            $table->boolean('completed')->default(0)->nullable();
            $table->boolean('successful')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_payment');
    }
};
