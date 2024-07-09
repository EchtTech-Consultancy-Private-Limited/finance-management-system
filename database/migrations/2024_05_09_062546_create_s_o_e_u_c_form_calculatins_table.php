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
        Schema::create('s_o_e_u_c_form_calculatins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soe_form_id');
            $table->string('head')->nullable();
            $table->string('sanction_order')->nullable();
            $table->string('previous_month_expenditure')->nullable();
            $table->string('previous_month_total')->nullable();
            $table->string('unspent_balance_1st')->nullable();
            $table->string('gia_received')->nullable();
            $table->string('total_balance')->nullable();
            $table->string('actual_expenditure')->nullable();
            $table->string('unspent_balance_last')->nullable();
            $table->string('committed_liabilities')->nullable();
            $table->string('unspent_balance_31st')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_o_e_u_c_form_calculatins');
    }
};
