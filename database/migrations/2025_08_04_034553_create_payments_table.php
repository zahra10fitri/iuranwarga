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
        Schema::create('payments', function (Blueprint $table) {
             $table->id();
            $table->foreignId('iduser')->constrained('users')->onDelete('cascade');
            $table->enum('period', ['mingguan', 'bulanan', 'tahunan']);
            $table->integer('nominal');
            $table->string('petugas');
            $table->enum('status', ['belum bayar', 'verified'])->default('belum bayar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
