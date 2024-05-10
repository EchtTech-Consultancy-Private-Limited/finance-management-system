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
        Schema::create('s_o_e_u_c_forms', function (Blueprint $table) {
            $table->id();
            $table->string('program_name')->nullable();
            $table->foreignId('state')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('finance_account_officer')->nullable();
            $table->string('finance_account_officer_mobile')->nullable();
            $table->string('finance_account_officer_email')->nullable();
            $table->string('nadal_officer')->nullable();
            $table->string('nadal_officer_mobile')->nullable();
            $table->string('nadal_officer_email')->nullable();
            $table->string('month')->nullable();
            $table->string('financial_year')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_o_e_u_c_forms');
    }
};