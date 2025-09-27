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
        Schema::create('daerah', function (Blueprint $table) {
            $table->string('id_daerah', 6)->primary();
            $table->string('id_prov', 6);
            $table->string('id_prov2', 8);
            $table->string('daerah', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daerah');
    }
};
