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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('nama');
            $table->string('tanggal_lahir');
            $table->enum('agama',['islam','kristen','hindu','buddha','khonghucu','atheis'])->default('atheis');
            $table->string('email');
            $table->enum('jurusan',['TI','SI'])->default('TI');
            $table->enum('semester', ['1','3'])->default('1');
            $table->enum('jenis_kelamin',['L','P'])->default('L');
            $table->string('no_hp');
            $table->text('alamat');
            $table->text('alasan_masuk');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
