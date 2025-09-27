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
        Schema::create('borang1', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('f8', 100);
            $table->string('f504', 100);
            $table->string('f502', 100);
            $table->string('f505', 100);
            $table->string('f506', 100);
            $table->string('f5a1', 100);
            $table->string('f5a2', 100);
            $table->string('f1101', 100);
            $table->string('f1102', 100);
            $table->string('f5b', 100);
            $table->string('f5c', 100);
            $table->string('f5d', 100);
            $table->dateTime('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borang1');
    }
};
