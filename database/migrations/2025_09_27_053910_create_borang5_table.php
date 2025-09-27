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
        Schema::create('borang5', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('f301', 100);
            $table->string('f302', 100);
            $table->string('f303', 100);
            $table->string('f401', 100);
            $table->string('f1402', 100);
            $table->string('f403', 100);
            $table->string('f404', 100);
            $table->string('f405', 100);
            $table->string('f406', 100);
            $table->string('f407', 100);
            $table->string('f408', 100);
            $table->string('f409', 100);
            $table->string('f410', 100);
            $table->string('f411', 100);
            $table->string('f412', 100);
            $table->string('f413', 100);
            $table->string('f414', 100);
            $table->string('f415', 100);
            $table->string('f416', 100);
            $table->dateTime('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borang5');
    }
};
