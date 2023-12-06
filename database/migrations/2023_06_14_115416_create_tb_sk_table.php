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
        Schema::create('tb_sk', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->string('kepada');
            $table->string('perihal');
            $table->enum('lampiran', ['1 Lampiran', '2 Lampiran', '3 Lampiran','4 Lampiran','5 Lampiran','6 Lampiran']);
            $table->enum('sifat', ['biasa','segera','sangat segera']);
            $table->text('isi_surat');
            $table->string('catatan')->nullable();
            $table->date('tgl_arsip')->nullable();
            $table->binary('ttd')->nullable();
            $table->enum('aktivitas', ['1','2','3','4']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sk');
    }
};
