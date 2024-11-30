<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('riwayat_pembayarans', function (Blueprint $table) {
            // Ubah tipe kolom menjadi text
            $table->text('nama_pemeriksaan')->nullable()->change();
            $table->text('biaya_pemeriksaan')->nullable()->change();
            $table->text('nama_obat')->nullable()->change();
            $table->text('jumlah_obat')->nullable()->change();
            $table->text('satuan_obat')->nullable()->change();
            $table->text('total_biaya_obat')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('riwayat_pembayarans', function (Blueprint $table) {
            $table->string('nama_pemeriksaan')->nullable()->change();
            $table->decimal('biaya_pemeriksaan', 12, 2)->default(0)->change();
            $table->string('nama_obat')->nullable()->change();
            $table->integer('jumlah_obat')->nullable()->change();
            $table->string('satuan_obat')->nullable()->change();
            $table->decimal('total_biaya_obat', 12, 2)->default(0)->change();
        });
    }
};
