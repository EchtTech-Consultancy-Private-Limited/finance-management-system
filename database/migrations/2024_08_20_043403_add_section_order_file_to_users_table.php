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
        Schema::table('s_o_e_u_c_forms', function (Blueprint $table) {
            $table->string('section_order_file')->nullable()->after('financial_year');
            $table->string('section_order_file_size')->nullable()->after('financial_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('s_o_e_u_c_forms', function (Blueprint $table) {
            //
        });
    }
};
