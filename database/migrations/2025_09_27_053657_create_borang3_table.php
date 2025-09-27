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
        Schema::create('borang3', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('f1761', 100);
            $table->string('f1762', 100);
            $table->string('f1763', 100);
            $table->string('f1764', 100);
            $table->string('f1765', 100);
            $table->string('f1766', 100);
            $table->string('f1767', 100);
            $table->string('f1768', 100);
            $table->string('f1769', 100);
            $table->string('f1770', 100);
            $table->string('f1771', 100);
            $table->string('f1772', 100);
            $table->string('f1773', 100);
            $table->string('f1774', 100);
            $table->dateTime('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borang3');
    }
};
