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
        Schema::create('isp_package_charge', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->foreignId('package_id')->constrained('isp_package')->onDelete('cascade')->index('package_id');
            $table->foreignId('ledger_id')->constrained('account_ledger')->onDelete('cascade')->index('ledger_id');
            $table->tinyInteger('quantity')->default(1);
            $table->string('description')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->boolean('published')->default(true)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_package_charge');
    }
};
