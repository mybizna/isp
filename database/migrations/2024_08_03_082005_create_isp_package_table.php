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
            $table->foreignId('billing_cycle_id')->nullable()->constrained('isp_billing_cycle')->onDelete('set null');
            $table->foreignId('gateway_id')->nullable()->constrained('isp_gateway')->onDelete('set null');
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
        Schema::dropIfExists('isp_package');
    }
};
