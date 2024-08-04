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
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('kelurahan_desa', 50)->nullable()->after('rw');
            $table->string('kecamatan', 50)->nullable()->after('kelurahan_desa');
            $table->string('agama', 50)->nullable()->after('kecamatan');
            $table->date('tanggal_lahir')->nullable()->after('agama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('kelurahan_desa');
            $table->dropColumn('kecamatan');
            $table->dropColumn('agama');
            $table->dropColumn('tanggal_lahir');
        });
    }
};
