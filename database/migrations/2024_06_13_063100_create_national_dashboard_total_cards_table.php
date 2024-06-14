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
        Schema::create('national_dashboard_total_cards', function (Blueprint $table) {
            $table->id();
            $table->string('total_state_ut')->nullable();
            $table->string('total_sentinel_site')->nullable();
            $table->string('total_ppcl_labs')->nullable();
            $table->string('total_regional_coordinator')->nullable();
            $table->string('total_nrcp_labs')->nullable();
            $table->string('total_pm_abhim_sss')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('national_dashboard_total_cards');
    }
};
