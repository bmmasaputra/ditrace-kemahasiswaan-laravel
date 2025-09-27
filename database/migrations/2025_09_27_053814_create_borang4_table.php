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
        Schema::create('borang4', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('f21', 100);
            $table->string('f22', 100);
            $table->string('f23', 100);
            $table->string('f24', 100);
            $table->string('f25', 100);
            $table->string('f26', 100);
            $table->string('f27', 100);
            $table->dateTime('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borang4');
    }
};
