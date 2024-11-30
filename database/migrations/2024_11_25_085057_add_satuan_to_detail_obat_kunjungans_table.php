<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_obat_kunjungans', function (Blueprint $table) {
            $table->string('satuan')->nullable()->after('jumlah');
        });
    }

    public function down(): void
    {
        Schema::table('detail_obat_kunjungans', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });
    }
};
