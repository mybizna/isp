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
        Schema::create('isp_package', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('pool');
            $table->string('description')->nullable();
            $table->foreignId('billing_cycle_id')->constrained('isp_billing_cycle')->onDelete('cascade')->nullable()->index('isp_package_billing_cycle_id');
            $table->foreignId('gateway_id')->constrained('isp_gateway')->onDelete('cascade')->nullable()->index('isp_package_gateway_id');
            $table->string('speed')->nullable();
            $table->enum('speed_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();
            $table->string('bundle')->nullable();
            $table->enum('bundle_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();
            $table->integer('ordering');
            $table->boolean('published')->default(true)->nullable();
            $table->boolean('featured')->default(false)->nullable();
            $table->boolean('default')->default(false)->nullable();
            $table->boolean('is_unlimited')->default(false)->nullable();
            $table->boolean('is_hidden')->default(false)->nullable();
            $table->decimal('amount', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_package');
    }
};
