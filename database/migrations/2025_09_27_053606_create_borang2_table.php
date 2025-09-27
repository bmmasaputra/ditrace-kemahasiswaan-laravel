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
        Schema::create('borang2', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('f18a', 100);
            $table->string('f18b', 100);
            $table->string('f18c', 100);
            $table->string('f18d', 100);
            $table->string('f1201', 100);
            $table->string('f1202', 100);
            $table->string('f14', 100);
            $table->string('f15', 100);
            $table->dateTime('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borang2');
    }
};
