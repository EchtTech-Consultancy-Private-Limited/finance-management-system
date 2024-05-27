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
        Schema::create('national_seo_expanses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('state_id');
            $table->foreignId('city_id');
            $table->foreignId('institute_program_id')->nullable();
            $table->string('expanse_plan')->nullable()->comment('1=>year, 2=>month, 3=>quarter');
            $table->string('institute_name')->nullable();
            $table->string('finance_account_officer')->nullable();
            $table->string('finance_account_officer_mobile')->nullable();
            $table->string('finance_account_officer_email')->nullable();
            $table->string('nadal_officer')->nullable();
            $table->string('nadal_officer_mobile')->nullable();
            $table->string('nadal_officer_email')->nullable();
            $table->string('month')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('reason')->nullable();
            $table->tinyInteger('status')->nullable()->comment('1=>approve,2=>not-approved,3=>pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('national_seo_expanses');
    }
};
