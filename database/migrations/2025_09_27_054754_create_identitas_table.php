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
        Schema::create('identitas', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('fakultas', 150);
            $table->string('prodi', 150);
            $table->integer('thn_lulus')->nullable();
            $table->string('nama', 150);
            $table->string('domisili', 150)->nullable();
            $table->string('daerah', 150)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp', 13)->nullable();
            $table->string('mail', 50)->nullable();
            $table->text('nik')->nullable();
            $table->string('npwp', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas');
    }
};
