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
        Schema::create('dues_categories', function (Blueprint $table) {
           $table->id();
            $table->enum('period', ['mingguan', 'bulanan', 'tahunan']);
            $table->integer('nominal');
             $table->enum('status', ['aktif', 'nonaktif']); // aktif / tidak
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dues_categories');
    }
};
