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
        Schema::create('s_o_e_u_c_upload_forms', function (Blueprint $table) {
            $table->id();
            $table->string('year',255)->nullable();
            $table->string('month',255)->nullable();
            $table->string('file',255)->nullable();
            $table->string('file_size',255)->nullable();
            $table->date('date',255)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_o_e_u_c_upload_forms');
    }
};
