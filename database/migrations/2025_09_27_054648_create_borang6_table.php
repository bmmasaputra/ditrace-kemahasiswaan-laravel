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
        Schema::create('borang6', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('f6', 100);
            $table->string('f7', 100);
            $table->string('f7a', 100);
            $table->string('f1001', 100);
            $table->string('f1002', 100);
            $table->string('f1601', 100);
            $table->string('f1602', 100);
            $table->string('f1603', 100);
            $table->string('f1604', 100);
            $table->string('f1605', 100);
            $table->string('f1606', 100);
            $table->string('f1607', 100);
            $table->string('f1608', 100);
            $table->string('f1609', 100);
            $table->string('f1610', 100);
            $table->string('f1611', 100);
            $table->string('f1612', 100);
            $table->string('f1613', 100);
            $table->string('f1614', 100);
            $table->dateTime('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borang6');
    }
};
