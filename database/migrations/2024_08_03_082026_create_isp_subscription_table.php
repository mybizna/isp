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

            $table->foreignId('subscriber_id')->nullable()->constrained('isp_subscriber')->onDelete('set null');
            $table->foreignId('package_id')->nullable()->constrained('isp_package')->onDelete('set null');
            $table->datetime('start_date');
            $table->datetime('end_date');

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
        Schema::dropIfExists('isp_subscription');
    }
};
