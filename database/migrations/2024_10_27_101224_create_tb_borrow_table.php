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
        Schema::create('tb_borrow', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_borrow');
            $table->string('quantity');
            $table->text('description');
            $table->foreignUuid('id_inventaris')->constrained('tb_inventaris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_borrow');
    }
};
