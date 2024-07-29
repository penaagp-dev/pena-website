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
        Schema::create('tb_registerca', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->date('date_of_birth');
            $table->enum('religion', ['islam', 'kristen', 'hindu', 'budha', 'konghucu']);
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('major', ['Teknik informatika', 'Sistem informasi']);
            $table->enum('semester', ['1', '3']);
            $table->enum('gender', ['male', 'female']);
            $table->string('address');
            $table->text('reason_register');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('photo');
            $table->string('email_token')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_registerca');
    }
};
