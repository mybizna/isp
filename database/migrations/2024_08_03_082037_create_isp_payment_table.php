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
            $table->foreignId('subscription_id')->nullable()->constrained('isp_subscription')->onDelete('set null');
            $table->foreignId('invoice_id')->nullable()->constrained('account_invoice')->onDelete('set null');
            $table->string('description')->nullable();
            $table->boolean('is_paid')->default(0)->nullable();
            $table->boolean('completed')->default(0)->nullable();
            $table->boolean('successful')->default(0)->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
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
