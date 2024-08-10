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
        Schema::create('isp_subscriber_login', function (Blueprint $table) {
            $table->id();

            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->string('username')->nullable();
            $table->string('link_login')->nullable();
            $table->string('link_orig')->nullable();
            $table->string('error')->nullable();
            $table->string('chap_id')->nullable();
            $table->string('chap_challenge')->nullable();
            $table->string('link_login_id')->nullable();
            $table->string('link_orig_esc')->nullable();
            $table->string('mac_esc')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isp_subscriber_login');
    }
};
