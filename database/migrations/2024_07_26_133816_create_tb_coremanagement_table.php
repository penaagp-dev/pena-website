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
        Schema::create('tb_coremanagement', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->enum('jabatan', ['ketua umum', 'wakil ketua umum', 'sekretaris', 'bendahara', 'pembina','learning','entrepreneur']);
            $table->string('photo');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_coremanagement');
    }
};
