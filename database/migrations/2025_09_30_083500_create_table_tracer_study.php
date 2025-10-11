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
        Schema::create('tracer_study', function (Blueprint $table) {
            // PK
            $table->string('nim', 20)->primary();

            // =============== identitas ===============
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

            // =============== borang1 ===============
            $table->char('f8', 2);
            $table->char('f504', 2)->nullable();
            $table->char('f502', 2)->nullable();
            $table->string('f505', 100)->nullable();
            $table->char('f506', 2)->nullable();
            $table->char('f5a1', 10)->nullable();
            $table->char('f5a2', 10)->nullable();
            $table->char('f1101', 2)->nullable();
            $table->string('f1102', 100)->nullable();
            $table->string('f5b', 100)->nullable();
            $table->char('f5c', 2)->nullable();
            $table->char('f5d', 2)->nullable();

            // =============== borang2 ===============
            $table->char('f18a', 2)->nullable();
            $table->string('f18b', 100)->nullable();
            $table->string('f18c', 100)->nullable();
            $table->date('f18d')->nullable();
            $table->char('f1201', 2)->nullable();
            $table->string('f1202', 100)->nullable();
            $table->char('f14', 2)->nullable();
            $table->char('f15', 2)->nullable();

            // =============== borang3 (semua NOT NULL, char(2)) ===============
            $table->char('f1761', 2);
            $table->char('f1762', 2);
            $table->char('f1763', 2);
            $table->char('f1764', 2);
            $table->char('f1765', 2);
            $table->char('f1766', 2);
            $table->char('f1767', 2);
            $table->char('f1768', 2);
            $table->char('f1769', 2);
            $table->char('f1770', 2);
            $table->char('f1771', 2);
            $table->char('f1772', 2);
            $table->char('f1773', 2);
            $table->char('f1774', 2);

            // =============== borang4 (semua NOT NULL, char(2)) ===============
            $table->char('f21', 2);
            $table->char('f22', 2);
            $table->char('f23', 2);
            $table->char('f24', 2);
            $table->char('f25', 2);
            $table->char('f26', 2);
            $table->char('f27', 2);

            // =============== borang5 ===============
            $table->char('f301', 2)->nullable();
            $table->string('f302', 100)->nullable();
            $table->string('f303', 100)->nullable();
            $table->integer('f401')->default(0);
            $table->integer('f402')->default(0);
            $table->integer('f403')->default(0);
            $table->integer('f404')->default(0);
            $table->integer('f405')->default(0);
            $table->integer('f406')->default(0);
            $table->integer('f407')->default(0);
            $table->integer('f408')->default(0);
            $table->integer('f409')->default(0);
            $table->integer('f410')->default(0);
            $table->integer('f411')->default(0);
            $table->integer('f412')->default(0);
            $table->integer('f413')->default(0);
            $table->integer('f414')->default(0);
            $table->integer('f415')->default(0);
            $table->integer('f416')->default(0);

            // =============== borang6 ===============
            $table->string('f6', 100)->nullable();
            $table->string('f7', 100)->nullable();
            $table->string('f7a', 100)->nullable();
            $table->char('f1001', 2)->nullable();
            $table->string('f1002', 100)->nullable();
            $table->integer('f1601')->default(0);
            $table->integer('f1602')->default(0);
            $table->integer('f1603')->default(0);
            $table->integer('f1604')->default(0);
            $table->integer('f1605')->default(0);
            $table->integer('f1606')->default(0);
            $table->integer('f1607')->default(0);
            $table->integer('f1608')->default(0);
            $table->integer('f1609')->default(0);
            $table->integer('f1610')->default(0);
            $table->integer('f1611')->default(0);
            $table->integer('f1612')->default(0);
            $table->integer('f1613')->default(0);
            $table->integer('f1614')->default(0);

            $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_tracer_study');
    }
};
