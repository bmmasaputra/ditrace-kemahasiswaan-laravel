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
        Schema::create('fakprodi', function (Blueprint $table) {
            $table->string('id_fakprodi', 6)->primary();
            $table->string('prodi', 150);         // NOT NULL
            $table->string('fakultas', 100);      // NOT NULL

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakprodi');
    }
};
