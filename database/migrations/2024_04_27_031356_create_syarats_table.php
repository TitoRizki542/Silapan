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
        Schema::create('syarats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrasi_id')->constrained('administrasis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            $table->string('berkas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarats');
    }
};
