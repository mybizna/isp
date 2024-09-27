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

            $table->foreignId('package_charge_id')->nullable()->constrained('isp_package_charge')->onDelete('set null');
            $table->foreignId('rate_id')->nullable()->constrained('account_rate')->onDelete('set null');
            $table->boolean('published')->default(true)->nullable();

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
        Schema::dropIfExists('isp_package_charge_rate');
    }
};
