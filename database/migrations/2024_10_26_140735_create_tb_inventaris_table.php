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
        Schema::create('tb_inventaris', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_inventaris');
            $table->integer('stock');
            $table->string('location_item');
            $table->string('id_category');
            $table->enum('status', ['borrow','ready']);
            $table->boolean('is_condition');
            $table->text('description');
            $table->string('img_inventaris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_inventaris');
    }
};
